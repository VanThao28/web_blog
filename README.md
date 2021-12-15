*tao web_blog laravel
-b1: +composer create-project laravel/laravel blog

    + cd blog

    +php artisan serve

-b2: +composer require laravel/breeze --dev
    +php artisan breeze:install
    +npm install
    +npm run dev
    +php artisan migrate
=>kiểm tra đổi DB_port trong file config->database.php

*copy từ thư mục view qua public bằng webpack.mix.js
(mix.copyDirectory)
chạy câu lệnh npm install, npm run dev.

* thêm sửa xóa user.
- sửa dụng controller:
    + php artisan make:controller AdminUser -r
* thêm cột ảnh vào migration
    - upload ảnh ở form bắt buộc phải thêm enctype="multipart/form"
    - php artisan make:migration create_table
    - thêm 1 hàm helpers để sử dụng nhiều lần
        ->tạo app/helpers.php
        ->thêm "file":[
            "app/helpers.php"
        ]
        vào file composer.json
    - tại srorage->app->public->users
        ->php artisan storage:link
        ->composer dump-autoload --no-scripts (chạy tất cả danh sách view,route,cache)