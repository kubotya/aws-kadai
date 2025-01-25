# aws-kadaiのレポ
## サービス構築手順
1. ローカルにクローン
    ```bash
    git clone https://github.com/kubotya/aws-kadai.git
    ```
2. Dockerfileを使用して環境を構築
※Dockerfileと同ディレクトリで
   ```bash
   docker compose up
   ```
3. コンテナが立ち上がった後、MySQLに接続しテーブルを作成
   ``` bash
   docker compose exec mysql mysql kyototech
   ```
SQL文で会員登録用テーブルを作成
   ```sql
    CREATE TABLE `users` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` TEXT NOT NULL,
    `email` TEXT NOT NULL,
    `password` TEXT NOT NULL,
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP);
   ```
   
   SQL文で記事投稿用テーブルを作成
   ```sql
    CREATE TABLE `bbs_entries` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT UNSIGNED NOT NULL,
    `body` TEXT NOT NULL,
    `image_filename` TEXT DEFAULT NULL,
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP);
   ```
4. EC2パブリックIPv4アドレス/signup.phpに接続し、名前、メールアドレス、パスワードを登録。

5. EC2パブリックIPv4アドレス/login.phpに接続し、メールアドレス、パスワードを入力し、ログイン。

6. EC2パブリックIPv4アドレス/bbs.phpに接続し、確認。
