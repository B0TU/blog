## Installation

Follow the below installation instruction.

1. Clone the project
```
git clone https://github.com/B0TU/blog.git
```
2. Update composer
```
cd blog
composer update
````
3. Copy .env.example and rename it to .env after then add your database credentials to .env file
```
cp .env.example .env
```
And For Windows
```
copy .env.example .env
```
5. Run database migration and database seeder
```
php artisan migrate --seed
```
5. Serve the project
```
php artisan key:generate
php artisan serve
```
Now visit http://127.0.0.1:8000

If you have laragon installed and running with auto virtual host on with Hostname "{name}.test" you can visit http://blog.test


Enjoy!
