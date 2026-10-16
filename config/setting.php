<?php
/**
 * BcLpShopTheme : baserCMS5 店舗 LP テーマ
 *
 * テーマの設定
 *
 * - ショートコード [Lp.news]：本文の1カラムテキストに書くと、ブログの最新記事の一覧に置き換わる（LpHelper::news()）
 *   書き方：[Lp.news]（ブログ news の最新3件）／[Lp.news news,5]（ブログ名,件数）
 */

return [
    'BcShortCode' => [
        'BcLpShopTheme' => [
            'Lp.news',
        ],
    ],
];
