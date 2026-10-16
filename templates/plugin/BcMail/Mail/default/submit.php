<?php
/**
 * BcLpShopTheme : baserCMS5 店舗 LP テーマ
 *
 * メールフォーム：完了
 *
 * 完了メッセージは、メールフォーム設定の「送信完了メッセージ」で編集する
 *
 * @var \BcMail\View\MailFrontAppView $this
 * @var \BcMail\Model\Entity\MailContent $mailContent
 */
use Cake\Core\Configure;

if (Configure::read('debug') == 0 && $mailContent->redirect_url) {
	$this->BcBaser->meta(['http-equiv' => 'Refresh'], null, ['content' => '5;url=' . $mailContent->redirect_url, 'block' => true]);
}
?>
<section class="sh-fsec">
	<div class="sh-wrap">
		<div class="sh-fhead">
			<p class="sh-eyebrow">RESERVATION &amp; CONTACT</p>
			<h1 class="sh-fhead__title"><?php $this->BcBaser->contentsTitle() ?></h1>
		</div>
		<div class="sh-fbox">
			<?php $this->BcBaser->element('lp_steps', ['current' => 3]) ?>
			<div class="sh-done">
				<svg class="sh-done__icon" width="64" height="64" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="32" cy="32" r="30"/><path d="M20 33l8 8 16-17"/></svg>
				<h2 class="sh-done__title">送信が完了しました</h2>
				<div class="sh-done__message">
					<?php if ($this->BcBaser->mailFormThanksExists()): ?>
						<?php $this->BcBaser->mailFormThanks() ?>
					<?php else: ?>
						<p>お問い合わせいただき、ありがとうございます。内容を確認のうえ、メールでご連絡いたします。</p>
					<?php endif ?>
				</div>
				<a class="sh-btn sh-btn--line sh-btn--lg" href="<?= h($this->BcBaser->getUrl('/')) ?>">トップページへ戻る</a>
			</div>
		</div>
	</div>
</section>
