アプリケーション名　contact-form-test

Dockerビルド
1.gitクローンURL git@github.com:ymksaitoh/contact-form-test.git
2.docker-compose up -d --build

Laravel環境構築
1.docker-compose exec php bash
2.composer install
3..env.exampleファイルから.envを作成して環境変数を変更
4.php artisan key:generate
5.php artisan migrate
6.php artisan db:seed

使用技術
・php: "^7.3|^8.0"
・laravel/framework: "^8.75"
・mysql:8.0.26

URL
・開発環境　http://localhost/
・phpMyAdmin　http://localhost:8080

ER図
<img width="632" height="762" alt="スクリーンショット 2025-07-19 11 20 18" src="https://github.com/user-attachments/assets/688fafde-ee14-4b99-8fb5-44d954b43a0f" />
