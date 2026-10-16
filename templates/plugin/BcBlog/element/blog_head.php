<?php
/**
 * BcLpShopTheme : baserCMS5 店舗 LP テーマ
 *
 * ブログの画面の見出し（英字のラベル＋見出し）
 *
 * - 英字のラベル：ブログのコンテンツ名（news → NEWS）
 *
 * @var \BaserCore\View\BcFrontAppView $this
 * @var string $title 見出し
 */
$label = strtoupper((string)$this->getRequest()->getAttribute('currentContent')?->name);
?>
<div class="sh-phead">
	<?php if ($label): ?>
		<p class="sh-eyebrow"><?= h($label) ?></p>
	<?php endif ?>
	<h1 class="sh-phead__title"><?= h($title) ?></h1>
</div>
