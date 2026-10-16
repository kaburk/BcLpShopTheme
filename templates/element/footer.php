<?php
/**
 * BcLpShopTheme : baserCMS5 店舗 LP テーマ
 *
 * フッター
 *
 * - 主催者名・問い合わせ先：ウィジェットエリア（テキストウィジェット）で編集する
 * - コピーライト：サイト名と年から自動で出す
 *
 * @var \BaserCore\View\BcFrontAppView $this
 */
?>
<footer class="sh-footer">
	<div class="sh-wrap">
		<div class="sh-footer__inner">
			<?php $this->BcBaser->widgetArea() ?>
		</div>
		<small class="sh-footer__copy">&copy; <?= date('Y') ?> <?= h($this->Lp->getSiteLabel()) ?></small>
	</div>
</footer>
