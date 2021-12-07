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

