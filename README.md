# aws-kadaiのレポ
## サービス構築手順
1. ローカルにクローンする
    ```bash
    git clone https://github.com/kubotya/aws-kadai.git
    ```
2. Dockerfileを使用して環境を構築する
※Dockerfileと同ディレクトリで
   ```bash
   docker compose up
   ```
3. コンテナが立ち上がった後、MySQLに接続しテーブルを作成する
   ``` bash
   docker compose exec mysql mysql kyototech
   ```
   SQL文で記事投稿用テーブルを作成
   ```sql
    CREATE TABLE posts (
        id INT AUTO_INCREMENT PRIMARY KEY,
        content TEXT NOT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    );
    ```
4. EC2パブリックIPv4アドレス/dormtodbtest.phpに接続し、確認。

## 加点要素
- 適切な名前のテーブルを作る
