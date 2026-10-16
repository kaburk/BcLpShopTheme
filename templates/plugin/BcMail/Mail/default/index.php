<?php
/**
 * BcLpShopTheme : baserCMS5 店舗 LP テーマ
 *
 * メールフォーム：入力
 *
 * - 見出し：メールフォームのタイトル
 * - リード文：メールフォーム設定の「説明文」
 * - 項目：メールフィールド（管理画面で追加・並べ替えできる）
 *
 * @var \BcMail\View\MailFrontAppView $this
 */
$this->BcBaser->element('form_datepicker');
?>
<section class="sh-fsec">
	<div class="sh-wrap">
		<div class="sh-fhead">
			<p class="sh-eyebrow">RESERVATION &amp; CONTACT</p>
			<h1 class="sh-fhead__title"><?php $this->BcBaser->contentsTitle() ?></h1>
		</div>
		<div class="sh-fbox">
			<?php $this->BcBaser->element('lp_steps', ['current' => 1]) ?>
			<div class="sh-fbox__lead"><?php $this->Mail->description() ?></div>
			<?php $this->BcBaser->flash() ?>
			<div class="sh-form">
				<?php $this->BcBaser->element('mail_form') ?>
			</div>
		</div>
	</div>
</section>
