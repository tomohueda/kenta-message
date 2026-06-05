# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## このアプリの概要

企業（約29社）ごとの音声「PR」メッセージ（ナレーション：森本ケンタ）を配信する、単機能の Laravel 10 アプリです。各企業は番号で識別され、`/message/show/{num}` にアクセスすると、その企業の音声クリップを自動再生するページが表示されます。プロジェクトには Breeze の認証スキャフォールドが含まれていますが、稼働中のルートには組み込まれておらず、実運用では使われていません。

## アーキテクチャ

実際に動いている機能は次の3要素だけです。

- **ルート** — `routes/web.php` に定義されている稼働ルートは1つだけです：`GET /message/show/{num}` → `MessageController@show`（名前付きルート `message.show`）。Laravel/Breeze のデフォルトルートはすべてコメントアウトされています。
- **コントローラ** — `app/Http/Controllers/MessageController.php` がドメインロジックのすべてです。`switch ($num)` で各企業番号を `$title`（日本語の企業名 + " PR"）と `$path`（`public/data/` 配下の `.m4a` ファイル）にマッピングし、`message_v2` ビューを返します。**企業を追加・変更するには、この switch を編集し、対応する音声ファイルを `public/data/` に置きます。**
- **ビュー** — `resources/views/message_v2.blade.php` が表示されるページです（Bootstrap 5 を CDN 経由で読み込み、Google Analytics タグ `G-5QQ57KPF55`、自動再生の `<audio>` 要素を持ちます）。`message.blade.php` は旧バージョンで、現在のルートからは使われていません。

音声アセットは `public/data/*.m4a` に置かれ、`asset($path)` によって静的ファイルとして直接配信されます。命名規則が一貫していない点に注意：番号 1〜18 は説明的なサフィックス付き（例 `1_ablaze.m4a`）、19 以降は番号のみ（例 `19.m4a`）です。

それ以外（`app/Models`、`Auth` 系コントローラ、profile ビュー、マイグレーション、Sanctum）は手を加えていない Laravel + Breeze のスキャフォールドであり、稼働中の機能の一部ではありません。

## コマンド

```bash
# 依存関係のインストール
composer install
npm install

# フロントエンドアセット（Tailwind/Vite — Breeze スキャフォールド用。message_v2 には不要）
npm run dev          # HMR 付き開発サーバ
npm run build        # 本番ビルド

# ローカルでの起動
php artisan serve    # http://localhost:8000 にアクセス後、/message/show/1 を開く

# テスト（PHPUnit）
php artisan test                       # 全テスト
php artisan test --filter=ExampleTest  # 単一のテストクラス/メソッド
./vendor/bin/phpunit                   # PHPUnit を直接実行

# コードスタイル（Laravel Pint）
./vendor/bin/pint            # 自動修正
./vendor/bin/pint --test     # チェックのみ
```

### Laravel Sail（Docker）

`docker-compose.yml` は Sail のフルスタック（MySQL 8、Redis、Meilisearch、Mailpit、Selenium、phpMyAdmin（:8080））を提供します。`./vendor/bin/sail up` で起動し、上記コマンドの先頭に `sail` を付けて実行します（例：`sail artisan test`）。

## デプロイ

Heroku にデプロイされています。`Procfile` は `vendor/bin/heroku-php-apache2 public/` を実行し、データベースは JawsDB MySQL です（コミット履歴を参照）。データベース設定は `.env` / `config/database.php` にあります（`DB_CONNECTION=mysql`）。
