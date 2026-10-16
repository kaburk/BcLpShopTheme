/**
 * BcLpShopTheme : baserCMS5 店舗 LP テーマ
 *
 * 共通 JS（jQuery 不要）
 * - SP メニューの開閉
 * - セクション見出しの英字ラベル（ブロックの ID から生成）
 * - メニューの価格の単位（円）を小さくする
 * - メールフォームの送信モード設定（BcMail の form-submit.js の代わり）
 */
(function () {
	'use strict';

	// SP メニュー
	var burger = document.querySelector('[data-sh-drawer-toggle]');
	var drawer = document.getElementById('sh-drawer');
	if (burger && drawer) {
		var setMenu = function (open) {
			burger.setAttribute('aria-expanded', open ? 'true' : 'false');
			burger.setAttribute('aria-label', open ? 'メニューを閉じる' : 'メニューを開く');
			drawer.hidden = !open;
		};
		burger.addEventListener('click', function () { setMenu(drawer.hidden); });
		drawer.querySelectorAll('a').forEach(function (a) {
			a.addEventListener('click', function () { setMenu(false); });
		});
		document.addEventListener('keydown', function (e) {
			if (e.key === 'Escape' && !drawer.hidden) { setMenu(false); burger.focus(); }
		});
	}

	// セクション見出しの英字ラベル：ID「bge-hours-and-access」→「HOURS & ACCESS」（見出しの枠に付け、見出しの上に出す）
	document.querySelectorAll('.bge-contents > .sh-blk--section[id^="bge-"]').forEach(function (el) {
		var label = el.id.replace(/^bge-/, '').replace(/-and-/g, ' & ').replace(/[-_]+/g, ' ').toUpperCase();
		var box = el.querySelector('.bgt-title-h2-container');
		if (label && box) { box.setAttribute('data-sh-label', label); }
	});

	// メニューの価格：最後の段落「550円」の「円」を小さくする
	document.querySelectorAll('.sh-blk--menu .bge-ckeditor > p:last-child').forEach(function (p) {
		if (p.children.length) { return; }
		var m = p.textContent.trim().match(/^([\d,.]+)(\D+)$/);
		if (!m) { return; }
		p.textContent = m[1];
		var unit = document.createElement('small');
		unit.textContent = m[2];
		p.appendChild(unit);
	});

	// メールフォーム：押したボタンに応じて mode を設定（Confirm / Back / Submit）
	var mode = document.getElementById('MailMessageMode');
	if (mode) {
		document.querySelectorAll('.form-submit').forEach(function (btn) {
			btn.addEventListener('click', function () {
				btn.style.pointerEvents = 'none';
				mode.value = (btn.id || '').replace('BtnMessage', '');
			});
		});
	}
})();
