<?php
/**
 * BcLpShopTheme : baserCMS5 店舗 LP テーマ
 *
 * ブログのアーカイブ（カテゴリ・タグ・年月日ごとの記事一覧）
 *
 * @var \BaserCore\View\BcFrontAppView $this
 * @var \Cake\ORM\ResultSet $posts ブログ記事
 * @var string $blogArchiveType アーカイブの種類
 */
$title = '';
if ($blogArchiveType === 'category') $title = $blogCategory->title;
if ($blogArchiveType === 'author') $title = $author->getDisplayName();
if ($blogArchiveType === 'tag') $title = rawurldecode($blogTag->name);
if ($blogArchiveType === 'daily') $title = __d('baser_core', '{0}年{1}月{2}日', $year, $month, $day);
if ($blogArchiveType === 'monthly') $title = __d('baser_core', '{0}年{1}月', $year, $month);
if ($blogArchiveType === 'yearly') $title = __d('baser_core', '{0}年', $year);
$this->BcBaser->setTitle($title);
$this->BcBaser->setDescription($this->BcBaser->getBlogTitle() . '｜' . __d('baser_core', '{0} のアーカイブ一覧です。', $title));
$this->BcBaser->setTableToUpload('BcBlog.BlogPosts');
?>
<section class="sh-psec">
	<div class="sh-wrap sh-wrap--narrow">
		<?php $this->BcBaser->element('blog_head', ['title' => $title]) ?>
		<?php $this->BcBaser->element('blog_list', ['posts' => $posts]) ?>
		<?php $this->BcBaser->pagination('simple') ?>
		<p class="sh-psec__back"><a href="<?= h($this->BcBaser->getBlogContentsUrl($this->Blog->getCurrentBlogId(), false)) ?>"><?= h($this->BcBaser->getBlogTitle()) ?>の一覧へ</a></p>
	</div>
</section>
