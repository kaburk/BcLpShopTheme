<?php
/**
 * BcLpShopTheme : baserCMS5 店舗 LP テーマ
 *
 * ブログの記事の並び（一覧・アーカイブ）
 *
 * LP のお知らせ（BcBlog/Blog/default/posts.php）と同じ見た目にする（style.css の「お知らせの一覧」）
 *
 * @var \BaserCore\View\BcFrontAppView $this
 * @var \Cake\ORM\ResultSet $posts ブログ記事
 */
?>
<div class="sh-news">
	<?php if ($posts->count()): ?>
		<?php foreach ($posts as $post): ?>
			<?php $text = $this->Lp->getExcerpt($post->content) ?>
			<a class="sh-news__item" href="<?= h($this->BcBaser->getBlogPostLinkUrl($post)) ?>">
				<time class="sh-news__date" datetime="<?= h($post->posted?->format('Y-m-d')) ?>"><?php $this->BcBaser->blogPostDate($post, 'Y.m.d') ?></time>
				<span class="sh-news__body">
					<span class="sh-news__title"><?= h($post->title) ?></span>
					<?php if ($text !== ''): ?>
						<span class="sh-news__text"><?= h($text) ?></span>
					<?php endif ?>
				</span>
			</a>
		<?php endforeach ?>
	<?php else: ?>
		<p class="sh-news__empty">記事がありません。</p>
	<?php endif ?>
</div>
