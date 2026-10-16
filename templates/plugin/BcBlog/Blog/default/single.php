<?php
/**
 * BcLpShopTheme : baserCMS5 店舗 LP テーマ
 *
 * ブログの記事詳細（お知らせの詳細）
 *
 * - 見出し：記事のタイトル、その上に日付とカテゴリ
 * - アイキャッチ画像（設定されていれば）→ 本文 → 詳細
 * - 前後の記事へのリンク、一覧へのリンク
 *
 * @var \BaserCore\View\BcFrontAppView $this
 * @var \BcBlog\Model\Entity\BlogPost $post ブログ記事
 */
$this->BcBaser->setDescription($this->BcBaser->getBlogTitle() . '｜' . $this->BcBaser->getBlogPostContent($post, false, false, 50));
$this->BcBaser->setTableToUpload('BcBlog.BlogPosts');
$this->BcBaser->setTitle($post->title);
?>
<section class="sh-psec">
	<div class="sh-wrap sh-wrap--narrow">
		<article class="sh-post">
			<div class="sh-phead sh-phead--post">
				<p class="sh-eyebrow"><?= h(strtoupper((string)$this->getRequest()->getAttribute('currentContent')?->name)) ?></p>
				<p class="sh-post__meta">
					<time datetime="<?= h($post->posted?->format('Y-m-d')) ?>"><?php $this->BcBaser->blogPostDate($post, 'Y.m.d') ?></time>
					<?php $this->BcBaser->blogPostCategory($post, ['class' => 'sh-post__category']) ?>
				</p>
				<h1 class="sh-phead__title"><?= h($post->title) ?></h1>
			</div>
			<?php if (!empty($post->eye_catch)): ?>
				<div class="sh-post__eyecatch"><?php $this->BcBaser->blogPostEyeCatch($post, ['link' => false]) ?></div>
			<?php endif ?>
			<div class="sh-post__body"><?php $this->BcBaser->blogPostContent($post) ?></div>
		</article>
		<nav class="sh-post__nav" aria-label="前後の記事">
			<span class="sh-post__prev"><?php $this->BcBaser->blogPostPrevLink($post, '← 前の記事') ?></span>
			<a class="sh-post__list" href="<?= h($this->BcBaser->getBlogContentsUrl($post->blog_content_id, false)) ?>"><?= h($this->BcBaser->getBlogTitle()) ?>の一覧へ</a>
			<span class="sh-post__next"><?php $this->BcBaser->blogPostNextLink($post, '次の記事 →') ?></span>
		</nav>
	</div>
</section>
