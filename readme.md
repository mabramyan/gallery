# Associate users with permissions and roles

### DB
```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE="your_database"
DB_USERNAME=root
DB_PASSWORD=root
```
### instalation

``` bash
composer update
php artisan cache:clear
php artisan key:generate
php artisan migrate:refresh --seed
```

## Default admin
login: admin@admin.com
<br>
pass: 12345678
