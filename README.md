## Installation

Follow the below installation instruction.

1. Clone the project
```
git clone https://github.com/B0TU/blog.git
```
2. Copy .env.example and rename it to .env after then add you datbase credentials to .env file
3. Now update composer packages
```
composer update
````
4. Run database migration and database seeder
```
php artisan migrate --seed
```
5. Now serve the project locally
```
php artisan serve --port 5000
```
Now visit http://127.0.0.1:5000

Enjoy!
