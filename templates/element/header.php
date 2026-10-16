<?php
/**
 * BcLpShopTheme : baserCMS5 店舗 LP テーマ
 *
 * ヘッダー
 *
 * - ロゴ：テーマ設定のロゴ。未設定ならサイト名を文字で出す
 * - ナビ：本文で「ID設定」をしたブロックの見出しから自動で作る（LpHelper::getNavItems()）
 *   ブログの画面など本文のない画面では、トップページの本文から作り、トップページの各セクションへリンクする
 * - 予約するボタン：公開中の最初のメールフォームへリンクする（LpHelper::getFormUrl()）
 * - メールフォームの画面では、ナビの代わりに「戻る」リンクを出す
 *
 * @var \BaserCore\View\BcFrontAppView $this
 */
$isMailPage = ($this->getRequest()->getParam('plugin') === 'BcMail');
$page = $this->get('page');
$navBase = '';
if ($isMailPage) {
	$navItems = [];
} elseif (!empty($page)) {
	$navItems = $this->Lp->getNavItems($page->contents);
} else {
	$navItems = $this->Lp->getNavItems($this->Lp->getTopPageContents());
	$navBase = $this->BcBaser->getUrl('/');
}
$formUrl = $isMailPage? '' : $this->Lp->getFormUrl();
$hasMenu = ($navItems || $formUrl);

ob_start();
$this->BcBaser->logo(['link' => '']);
$logo = trim(ob_get_clean());
?>
<header class="sh-header">
	<div class="sh-wrap sh-header__inner">
		<a class="sh-header__logo" href="<?= h($this->BcBaser->getUrl('/')) ?>">
			<?php if ($logo): ?>
				<?= $logo ?>
			<?php else: ?>
				<?= h($this->Lp->getSiteLabel()) ?>
			<?php endif ?>
		</a>

		<?php if ($isMailPage): ?>
			<a class="sh-back" href="<?= h($this->BcBaser->getUrl('/')) ?>">← トップページに戻る</a>
		<?php else: ?>
			<?php if ($navItems): ?>
				<nav class="sh-nav" aria-label="ページ内">
					<ul>
						<?php foreach ($navItems as $item): ?>
							<li><a href="<?= h($navBase) ?>#<?= h($item['id']) ?>"><?= h($item['label']) ?></a></li>
						<?php endforeach ?>
					</ul>
				</nav>
			<?php endif ?>
			<?php if ($formUrl): ?>
				<a class="sh-btn sh-btn--sm sh-header__cta" href="<?= h($this->BcBaser->getUrl($formUrl)) ?>">予約する</a>
			<?php endif ?>
			<?php if ($hasMenu): ?>
				<button class="sh-burger" type="button" data-sh-drawer-toggle aria-expanded="false" aria-controls="sh-drawer" aria-label="メニューを開く">
					<svg class="sh-burger__open" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
					<svg class="sh-burger__close" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><path d="M18 6 6 18M6 6l12 12"/></svg>
				</button>
			<?php endif ?>
		<?php endif ?>
	</div>

	<?php if (!$isMailPage && $hasMenu): ?>
		<nav class="sh-drawer" id="sh-drawer" aria-label="メニュー" hidden>
			<?php if ($navItems): ?>
				<ul>
					<?php foreach ($navItems as $item): ?>
						<li><a href="<?= h($navBase) ?>#<?= h($item['id']) ?>"><?= h($item['label']) ?></a></li>
					<?php endforeach ?>
				</ul>
			<?php endif ?>
			<?php if ($formUrl): ?>
				<a class="sh-btn" href="<?= h($this->BcBaser->getUrl($formUrl)) ?>">予約する</a>
			<?php endif ?>
		</nav>
	<?php endif ?>
</header>
