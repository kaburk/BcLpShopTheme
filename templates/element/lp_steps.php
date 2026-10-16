<?php
/**
 * BcLpShopTheme : baserCMS5 店舗 LP テーマ
 *
 * 手続きの流れ（1. 入力 → 2. 確認 → 3. 完了）
 *
 * @var \BaserCore\View\BcFrontAppView $this
 * @var int $current 現在の手順（1〜3）
 */
$steps = [1 => '入力', 2 => '確認', 3 => '完了'];
?>
<ol class="sh-steps" aria-label="手続きの流れ">
	<?php foreach ($steps as $no => $label): ?>
		<li<?= ($no === $current)? ' class="is-current" aria-current="step"' : '' ?>><?= $no ?>. <?= h($label) ?></li>
	<?php endforeach ?>
</ol>
