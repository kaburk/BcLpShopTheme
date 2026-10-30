<?php
declare(strict_types=1);
/**
 * BcLpShopTheme : baserCMS5 店舗 LP テーマ
 */

namespace BcLpShopTheme\View\Helper;

use BcMail\Service\MailContentsServiceInterface;
use BaserCore\Utility\BcContainerTrait;
use Cake\View\Helper;

/**
 * BcLpShopTheme 用ヘルパー
 *
 * テーマの src/View/Helper に置くと、公開画面で自動的に読み込まれる（$this->Lp）
 */
class LpHelper extends Helper
{

    use BcContainerTrait;

    /**
     * 本文（BurgerEditor）から、ページ内ナビの項目を取り出す
     *
     * 「ID設定」をしたブロック（id="bge-xxx"）のうち、中に見出し（h1〜h3）があるものを、
     * 本文の並び順で返す。見出しの文字がナビの項目名になる。
     * 独自class「sh-blk--nonav」を付けたブロックは、ナビに載せない。
     *
     * @param string|null $contents 固定ページの本文
     * @return array<int, array{id: string, label: string}>
     */
    public function getNavItems(?string $contents): array
    {
        if (!$contents || !str_contains($contents, 'id="bge-')) {
            return [];
        }
        $dom = new \DOMDocument();
        $previous = libxml_use_internal_errors(true);
        $loaded = $dom->loadHTML('<?xml encoding="UTF-8"><div>' . $contents . '</div>', LIBXML_NOERROR | LIBXML_NOWARNING);
        libxml_clear_errors();
        libxml_use_internal_errors($previous);
        if (!$loaded) {
            return [];
        }
        $xpath = new \DOMXPath($dom);
        $items = [];
        foreach ($xpath->query('//*[@data-bgb][starts-with(@id, "bge-")]') as $block) {
            /** @var \DOMElement $block */
            if (in_array('sh-blk--nonav', preg_split('/\s+/', $block->getAttribute('class')), true)) {
                continue;
            }
            $heading = $xpath->query('.//h1|.//h2|.//h3', $block)->item(0);
            if (!$heading) {
                continue;
            }
            $label = trim(preg_replace('/\s+/u', ' ', $heading->textContent));
            if ($label === '') {
                continue;
            }
            $items[] = ['id' => $block->getAttribute('id'), 'label' => $label];
        }
        return $items;
    }

    /**
     * サイト名（ロゴが未設定のときの文字、コピーライトに使う）
     *
     * テーマ設定のロゴの代替テキスト → サイトのタイトル の順で使う
     *
     * @param bool $preferLogoAlt ロゴの代替テキストを優先するか
     * @return string
     */
    public function getSiteLabel(bool $preferLogoAlt = true): string
    {
        if ($preferLogoAlt) {
            try {
                $configs = \Cake\ORM\TableRegistry::getTableLocator()->get('BcThemeConfig.ThemeConfigs')->getKeyValue();
                if (!empty($configs['logo_alt'])) {
                    return (string)$configs['logo_alt'];
                }
            } catch (\Throwable) {
            }
        }
        $site = $this->getView()->getRequest()->getAttribute('currentSite');
        return $site? (string)($site->title ?: $site->display_name) : '';
    }

    /**
     * 公開中の最初のメールフォームの URL を返す
     *
     * @return string フォームがなければ空文字
     */
    public function getFormUrl(): string
    {
        try {
            $site = $this->getView()->getRequest()->getAttribute('currentSite');
            $service = $this->getService(MailContentsServiceInterface::class);
            foreach ($service->getPublishedAll($site? (int)$site->id : null) as $mailContent) {
                if (!empty($mailContent->content->url)) {
                    return (string)$mailContent->content->url;
                }
            }
        } catch (\Throwable $e) {
            return '';
        }
        return '';
    }

    /**
     * トップページ（サイトの /index）の本文を返す
     *
     * ブログの画面など、本文のない画面でもヘッダーのナビを出すために使う
     *
     * @return string|null トップページがなければ null
     */
    public function getTopPageContents(): ?string
    {
        try {
            $site = $this->getView()->getRequest()->getAttribute('currentSite');
            $content = \Cake\ORM\TableRegistry::getTableLocator()->get('BaserCore.Contents')->find()
                ->where([
                    'Contents.url' => '/index',
                    'Contents.type' => 'Page',
                    'Contents.site_id' => $site? (int)$site->id : 1,
                ])
                ->first();
            if (!$content) {
                return null;
            }
            $page = \Cake\ORM\TableRegistry::getTableLocator()->get('BaserCore.Pages')->find()
                ->where(['Pages.id' => $content->entity_id])
                ->first();
            return $page? (string)$page->contents : null;
        } catch (\Throwable) {
            return null;
        }
    }

    /**
     * 記事の本文から、一覧に出す短い文を作る
     *
     * 最初の段落だけを使い（段落がなければ本文全体）、タグを除いて指定の幅で切る
     *
     * @param string|null $html 記事の本文（HTML）
     * @param int $width 文字幅（全角1文字＝2）
     * @return string エスケープ前の文字列
     */
    public function getExcerpt(?string $html, int $width = 140): string
    {
        $html = (string)$html;
        if (preg_match('/<p[^>]*>(.*?)<\/p>/is', $html, $m)) {
            $html = $m[1];
        }
        $text = trim(preg_replace('/\s+/u', ' ', strip_tags($html)));
        return mb_strimwidth($text, 0, $width, '…');
    }

    /**
     * ブログの最新記事の一覧を返す（ショートコード [Lp.news] から呼ばれる）
     *
     * 見た目は templates/plugin/BcBlog/Blog/default/posts.php。
     * 本文の段落（<p>）の中に置き換わるので、出力は段落の中に入れられる要素（a・span・time）だけで組む。
     *
     * @param string $blogName ブログのコンテンツ名（初期値 news）
     * @param int|string $num 件数（初期値 3）
     * @return string ブログがないときは空文字
     */
    public function news(string $blogName = 'news', int|string $num = 3): string
    {
        $view = $this->getView();
        try {
            if (!$view->helpers()->has('Blog')) {
                $view->loadHelper('BcBlog.Blog');
            }
            return (string)$view->Blog->posts(trim($blogName), max(1, (int)$num), ['return' => true]);
        } catch (\Throwable) {
            return '';
        }
    }

    /**
     * サブフォルダに設置したサイト（例：https://example.com/hoge/）で、ページの HTML の中の
     * ルートからのパス（/contact/・/<テーマ>/img/… など）に、設置したフォルダ（/hoge）を足す
     *
     * - 初期データの本文は、ルートに置いたときのパスで書いているため、サブフォルダではリンクが切れる
     * - ルートに置いたサイト（base が空）では何もしない（出力は変わらない）
     * - View.afterLayout で呼ばれる（Helper::implementedEvents()）
     *
     * @param \Cake\Event\EventInterface $event
     * @param string $layoutFile
     * @return void
     */
    public function afterLayout(\Cake\Event\EventInterface $event, $layoutFile): void
    {
        $base = rtrim((string)$this->getView()->getRequest()->getAttribute('base'), '/');
        if ($base === '') {
            return;
        }
        $view = $this->getView();
        $view->assign('content', self::addBase($view->fetch('content'), $base));
    }

    /**
     * HTML の href・src・action・poster・srcset のうち、ルートからのパスに $base を足す
     * - //（プロトコル相対）で始まるもの、すでに $base/ で始まるものはそのまま
     *
     * @param string $html
     * @param string $base 設置したフォルダ（例：/hoge）
     * @return string
     */
    public static function addBase(string $html, string $base): string
    {
        $base = rtrim($base, '/');
        if ($base === '') {
            return $html;
        }
        $fix = function (string $url) use ($base): string {
            if (!str_starts_with($url, '/') || str_starts_with($url, '//') || $url === $base || str_starts_with($url, $base . '/')) {
                return $url;
            }
            return $base . $url;
        };
        $html = preg_replace_callback(
            '/(?<![\w-])(href|src|action|poster)=(["\'])(\/[^"\']*)\2/i',
            fn(array $m): string => $m[1] . '=' . $m[2] . $fix($m[3]) . $m[2],
            $html
        ) ?? $html;
        return preg_replace_callback(
            '/(?<![\w-])srcset=(["\'])([^"\']*)\1/i',
            function (array $m) use ($fix): string {
                $items = array_map(function (string $item) use ($fix): string {
                    $parts = preg_split('/\s+/', trim($item), 2);
                    return trim($fix($parts[0]) . ' ' . ($parts[1] ?? ''));
                }, explode(',', $m[2]));
                return 'srcset=' . $m[1] . implode(', ', $items) . $m[1];
            },
            $html
        ) ?? $html;
    }

}
