# BcLpShopTheme baserマーケット出品 入力値

フォームの欄の順に並べています。

## 基本情報

| 欄 | 入力値 |
|---|---|
| 公開ステータス | 非公開（承認後に公開） |
| テーマ・プラグイン名（商品名） | BcLpShopTheme |
| 種類 | 無料テーマ ／ レスポンシブデザイン |
| 販売価格（税抜） | 0 |
| カテゴリ | プロモーション、シンプル、baserCMS5対応 |
| バージョン | 1.0.0 |
| ファイル名 | BcLpShopTheme.zip |
| ファイルアップロード | `BcLpShopTheme.zip`（GitHub Release の zip と同じもの） |
| 対応バージョン | 5系：5.4.1、5.4.0 |
| 対応バージョン 備考 | baserCMS5.4以上。BurgerEditor（BcBurgerEditor）とブログ（BcBlog）プラグインが必要です。 |
| ライセンス | URLで指定する ／ 名称：MIT License ／ URL：https://github.com/kaburk/BcLpShopTheme/blob/main/LICENSE |
| 提供者 | 名称：kaburk ／ URL：https://blog.kaburk.com/ |
| Webサイト | 名称：（空欄） ／ URL：https://github.com/kaburk/BcLpShopTheme |
| デモサイト | 空欄 |
| サポートページ | 公式サイト以外 ／ 名称：（空欄） ／ URL：https://github.com/kaburk/BcLpShopTheme/issues |

## 説明概要（一覧画面・200文字以内：192文字）

```
baserCMS5.4以上向けの、飲食店・カフェ・小さな小売店のための1ページ LP テーマです。こだわり・メニューと価格表・店内の様子・お知らせ（ブログ）・営業時間とアクセス・予約フォームまでを、BurgerEditor のブロック操作と管理画面の設定だけで編集できます。配色はテーマ設定の4色で変更でき、見本サイト一式の初期データ付きです。BurgerEditor が必要です。
```

メイン画像：`main.png`（500×500）

---

## 説明情報1

**説明見出し1**：このテーマについて

**説明詳細1**（エディタの「ソース」に貼る）

```html
<p>BcLpShopTheme は、飲食店・カフェ・小さな小売店の紹介と、来店予約・お問い合わせのための、1ページのランディングページ（LP）テーマです。</p>
<p>トップの固定ページ1枚に、セクションを BurgerEditor のブロックで並べる構成です。セクションの追加・削除・並べ替えは、ブロック操作だけでできます。</p>
<ul>
<li>ヒーロー／こだわり／メニュー（おすすめ3品・価格表）／店内の様子／お知らせ／営業時間・アクセス（地図）／よくある質問／予約・お問い合わせ（CTA）</li>
<li>お知らせはブログ機能を使います。ブログ「お知らせ」に記事を書くと、LP のお知らせに最新3件が自動で並びます。記事の一覧・詳細ページも LP と同じデザインです</li>
<li>大見出しブロックの「ID設定」に英字（例 menu）を入れると、ヘッダーのナビに自動で載ります</li>
<li>予約・お問い合わせフォームは入力 → 確認 → 完了の3画面。ご希望の日付はカレンダーで選べます。項目はメールフィールドで追加・並べ替えできます</li>
<li>テーマ設定の4色（メイン／サブ／リンク／ホバー）で全体の配色が変わります。どの色にしても文字が読みやすいよう、文字の濃さと白黒を自動で調整します。ロゴもテーマ設定で変更できます</li>
<li>初期データ：見本サイト一式（default、お知らせの記事3件を含む）と最小構成（empty）</li>
<li>レスポンシブ（PC／スマホ）、prefers-reduced-motion 対応</li>
</ul>
```

**説明画像1**：`pc-1-hero.png`（PC：ヒーロー・こだわり）

---

## 説明情報2

**説明見出し2**：動作環境とインストール

**説明詳細2**

```html
<h4>動作環境</h4>
<ul>
<li>baserCMS5.4以上</li>
<li>BurgerEditor（BcBurgerEditor）プラグインが有効であること</li>
<li>ブログ（BcBlog）プラグインが有効であること（お知らせに使います。baserCMS の標準プラグインです）</li>
</ul>
<h4>インストール</h4>
<ol>
<li>ダウンロードした zip を解凍し、フォルダ名が「BcLpShopTheme」であることを確認して plugins フォルダに配置します（管理画面からのアップロードも可能です）</li>
<li>管理画面 &gt; プラグイン管理 で BcBurgerEditor と BcBlog が有効になっていることを確認します</li>
<li>管理画面 &gt; テーマ管理 で BcLpShopTheme を適用します</li>
<li>同じ画面で初期データ「default」（見本サイト）または「empty」（最小構成）を読み込みます</li>
</ol>
<p><strong>初期データを読み込むと、ユーザー以外のデータ（固定ページ・メールフォーム・ブログ・サイト基本設定など）は初期化されます。運用中のサイトでは読み込まないでください。</strong></p>
```

**説明画像2**：`sp.png`（スマホ：ファーストビュー・メニュー・予約）

---

## 説明情報3

**説明見出し3**：編集のしかた

**説明詳細3**

```html
<h4>編集できる場所</h4>
<table>
<tr><th>内容</th><th>編集する場所</th></tr>
<tr><td>本文（全セクション）</td><td>固定ページ「トップページ」の BurgerEditor</td></tr>
<tr><td>お知らせの記事</td><td>ブログ「お知らせ」</td></tr>
<tr><td>ロゴ・配色</td><td>テーマ設定</td></tr>
<tr><td>ヘッダーのナビ</td><td>本文の大見出しブロックの「ID設定」（自動で作られる）</td></tr>
<tr><td>ヘッダーの「予約する」ボタンのリンク先</td><td>自動（公開中の最初のメールフォーム）</td></tr>
<tr><td>フォームの説明文・完了メッセージ・項目</td><td>メールフォームの設定・メールフィールド</td></tr>
<tr><td>フッター（店名・住所・電話・営業時間・SNS）</td><td>ウィジェットエリア「フッター」のテキストウィジェット</td></tr>
</table>
<h4>本文ブロックの独自class</h4>
<p>ブロック設定の「独自class設定」に入れると、決まった見た目になります。</p>
<table>
<tr><th>独自class</th><th>使うブロック</th><th>見た目</th></tr>
<tr><td>sh-blk--hero</td><td>画像右寄せ（テキスト回り込み無し）</td><td>ヒーロー（写真が空なら円と線の図形）</td></tr>
<tr><td>sh-blk--section</td><td>大見出し</td><td>セクション見出し（ID設定でナビと英字ラベル）</td></tr>
<tr><td>sh-blk--nonav</td><td>大見出し（sh-blk--section と併用）</td><td>ナビに載せない</td></tr>
<tr><td>sh-blk--points</td><td>画像3列＋テキスト</td><td>こだわりのカード</td></tr>
<tr><td>sh-blk--menu</td><td>画像3列＋テキスト</td><td>メニューのカード（最後の段落が価格）</td></tr>
<tr><td>sh-blk--side</td><td>1カラムテキスト</td><td>価格表の見出し（PC で左の列）</td></tr>
<tr><td>sh-blk--price</td><td>2カラムテーブル</td><td>価格表</td></tr>
<tr><td>sh-blk--gallery</td><td>画像3列</td><td>写真を3枚並べる</td></tr>
<tr><td>sh-blk--news</td><td>1カラムテキスト</td><td>段落に [Lp.news] と書くと、お知らせの最新3件が並ぶ</td></tr>
<tr><td>sh-blk--map</td><td>GoogleMaps</td><td>お店の地図（直後に sh-blk--info を置くと PC で2列）</td></tr>
<tr><td>sh-blk--info</td><td>2カラムテーブル</td><td>店舗情報の表</td></tr>
<tr><td>sh-blk--faq</td><td>1カラムテキスト</td><td>よくある質問</td></tr>
<tr><td>sh-blk--cta</td><td>1カラムテキスト</td><td>予約の CTA（予約ボタンと電話の枠）</td></tr>
</table>
<p>ブロック設定の「背景色」は、テーマ色に置き換えています（ブルー＝メインの薄い色／グレー＝サブの薄い色／ピンク＝サブの濃い色）。</p>
<h4>営業時間・電話番号を変えるとき</h4>
<p>営業時間・定休日は、ヒーロー・店舗情報・予約の CTA・フッター・メールフィールドに書かれています。電話番号・住所は、店舗情報・予約の CTA・フッター・メールフォームの送信完了メッセージに書かれています。それぞれ直してください。</p>
```

**説明画像3**：`pc-2-menu.png`（PC：メニュー・価格表）

---

## 説明情報4

**説明見出し4**：お店の地図と制限事項

**説明詳細4**

```html
<h4>お店の地図（GoogleMaps ブロック）</h4>
<ul>
<li>管理画面 &gt; システム設定 &gt; サイト基本設定 で Google Maps API キーを登録してください</li>
<li>キーの Google Cloud プロジェクトで、Maps JavaScript API・Geocoding API・Maps Static API を有効にし、課金を設定してください</li>
<li>公開するサイトで使うキーには、HTTP リファラーの制限を設定してください</li>
</ul>
<h4>制限事項</h4>
<ul>
<li>営業時間・電話番号などは各ブロックに直接書くため、変更時は複数の場所を直す必要があります</li>
<li>予約フォームの日付・時間・人数は「任意」です（ほかの項目の値で必須を切り替えられないため、注意書きで案内しています）</li>
<li>初期データを読み込むと、お知らせの記事の投稿日は、読み込んだ時刻になります（baserCMS のブログの仕様）</li>
<li>お知らせのショートコード [Lp.news] は、1カラムテキストのブロックに書いてください（埋め込みタグのブロックでは置き換わりません）</li>
</ul>
```

**説明画像4**：`pc-3-news.png`（PC：お知らせ・営業時間とアクセス）

---

## 説明情報5

**説明見出し5**：ソースコード・ライセンス

**説明詳細5**

```html
<p>ソースコードは GitHub で公開しています。不具合の報告・要望は Issues にお願いします。</p>
<p><a href="https://github.com/kaburk/BcLpShopTheme" target="_blank">https://github.com/kaburk/BcLpShopTheme</a></p>
<p>テーマ本体は MIT License です。同梱物・外部リソースのライセンスは次のとおりです。</p>
<ul>
<li>jQuery 3.7.1（同梱）：MIT License</li>
<li>jQuery UI 1.11.4（baserCMS 同梱のものを読み込み）：MIT License</li>
<li>Google Fonts（Noto Sans JP・Shippori Mincho、CDN から読み込み）：SIL Open Font License 1.1</li>
<li>アイコン：Lucide のアイコンをもとにしています（ISC License）</li>
</ul>
<p>ご利用は自己責任でお願いします。</p>
```

**説明画像5**：`form.png`（PC：予約・お問い合わせフォームの入力画面）

予備：`pc-4-faq.png`（PC：よくある質問・予約・フッター）。差し替えたいときに使う。

---

## リリース

| 欄 | 入力値 |
|---|---|
| リリース種別 | 新規公開申請 |
| リリースノート | 新規リリース |

---

## zip の確認結果

GitHub Release 1.0.0 の `BcLpShopTheme.zip` を作ったあとに確認して書く。

- 最上位フォルダ名が `BcLpShopTheme` か（解凍してそのまま plugins に置けるか）
- `config.php`・`config/setting.php`・`VERSION.txt`（1.0.0）・`screenshot.png`・初期データ（default／empty、BcBlog を含む）・`LICENSE`・`README.md` を含むか
- `.github`・`docs`・`.DS_Store`・作業用ファイルを含まないか
