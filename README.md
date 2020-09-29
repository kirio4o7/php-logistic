# 簡易ロジスティックシステム

## リンク
https://glacial-caverns-63699.herokuapp.com

## 概要
- アプリケーション名「ロジスティックシステム」
- phpを用いてwebアプリケーションを作成。

![サンプル画像](https://raw.githubusercontent.com/kirio4o7/php-logistic/master/%E3%82%B9%E3%82%AF%E3%83%AA%E3%83%BC%E3%83%B3%E3%82%B7%E3%83%A7%E3%83%83%E3%83%88%202020-09-29%2021.14.34.png)

## このアプリケーションを作成した経緯
- 前職でこのようなアプリケーションツールがあれば便利だなと思い。
- 入荷時の詳細を見やすく、また共有しやすいアプリを意識。
- プログラミングを学習したいと思ったきっかけを形に残したいと思い。

以上の理由から作成をいたしました。

## 使用言語・データベース
- php 7.3.11
- CSS
- MySQL
- Heroku

## テーブル

# usersテーブル
|Column|Type|Options|
|------|----|-------|
|user_id|integer|null: fals|
|nickname|string|null: false|
|email|string|null: false|
|password|string|null: false|

# directedsテーブル
|Column|Type|Options|
|------|----|-------|
|id|integer|null: fals|
|title|string|null: false|
|task|string|null: false|
|instock|string|null: false|
|shipment|string|null: fals|
|arrivals|integer||
|rrival_unit|string||
|reserve|integer||
|reserve_unit|integer||
|comment|string||
|postcode|integer||
|prefecture|string||
|city|string||
|address|string||
|building|string||
|phone|string||
