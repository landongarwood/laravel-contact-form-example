## Configure database and mail credentials in .env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=
    DB_USERNAME=
    DB_PASSWORD=
    
    MAIL_DRIVER=
    MAIL_SMTP_HOST=
    MAIL_SMTP_PORT=
    MAIL_FROM_ADDRESS=
    MAIL_FROM_NAME=
    MAIL_ENCRYPTION=
    MAIL_SMTP_USERNAME=
    MAIL_SMTP_PASSWORD=

## Run project locally
    $ composer install
    $ php artisan key:generate
    $ php artisan migrate
    $ php artisan serve
    
