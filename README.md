# 簡易ロジスティックシステム

## リンク
https://glacial-caverns-63699.herokuapp.com

## 概要
- アプリケーション名[ロジスティックシステム]
　phpを用いてwebアプリケーションを作成したいと思い約2週間で作成、



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
