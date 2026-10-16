<?php
/**
 * BcLpShopTheme : baserCMS5 店舗 LP テーマ
 *
 * メールフォーム：確認
 *
 * @var \BcMail\View\MailFrontAppView $this
 * @var bool $freezed 確認画面かどうか（入力エラーのときは false）
 */
if ($freezed) {
	$this->Mailform->freeze();
} else {
	$this->BcBaser->element('form_datepicker');
}
?>
<section class="sh-fsec">
	<div class="sh-wrap">
		<div class="sh-fhead">
			<p class="sh-eyebrow">RESERVATION &amp; CONTACT</p>
			<h1 class="sh-fhead__title"><?php $this->BcBaser->contentsTitle() ?></h1>
		</div>
		<div class="sh-fbox">
			<?php $this->BcBaser->element('lp_steps', ['current' => $freezed? 2 : 1]) ?>
			<?php if ($freezed): ?>
				<p class="sh-fbox__lead">入力内容をご確認のうえ、「送信する」を押してください。</p>
			<?php else: ?>
				<div class="sh-fbox__lead"><?php $this->Mail->description() ?></div>
			<?php endif ?>
			<?php $this->BcBaser->flash() ?>
			<div class="sh-form<?= $freezed? ' is-confirm' : '' ?>">
				<?php $this->BcBaser->element('mail_form') ?>
			</div>
		</div>
	</div>
</section>
