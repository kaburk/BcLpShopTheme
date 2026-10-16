<?php
/**
 * BcLpShopTheme : baserCMS5 店舗 LP テーマ
 *
 * メールフォームの日付入力（カレンダー）に必要な jQuery UI を読み込む
 *
 * - メールフィールドのタイプ「日付（カレンダー）」は jQuery UI の datepicker を使う
 * - jQuery UI は bc-front に同梱されているものを使う（テーマには同梱しない）
 * - head の scripts() で出力されるよう、ブロックに追加する（inline = false）
 *
 * @var \BaserCore\View\BcFrontAppView $this
 */
$this->BcBaser->css('BcFront.jquery-ui/jquery-ui-1.11.4', false);
$this->BcBaser->js('BcFront.vendor/jquery-ui-1.11.4.min', false);
if ($this->BcBaser->isJapaneseLocale()) {
	$this->BcBaser->js('BcFront.vendor/i18n/ui.datepicker-ja', false);
}
