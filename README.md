# Installation
====================
Requirements :

- composer for php dependencies
- mysql or equivalent
- php > 8.0
- Node and NPM is recommanded


# Clone the Project
====================

````
git clone https://github.com/Zakuross/EcommerceBack.git
````
````
composer install
````




# Configure the .env
====================
- Create a copy of the .env.example and rename it to .env
- Within the .env change with your database connection 

````
DB_CONNECTION=mysql 
DB_HOST=127.0.0.1 
DB_PORT=3306 
DB_DATABASE=yourdatabasename 
DB_USERNAME=youruser 
DB_PASSWORD=yourpassword
````

ReadMe Project E-Commerce :

First of all, my project focuses on an ecological site offering services and products that comply with ecological standards. This is the back-end of my site.

I opted to initialize this project with Laravel, although it wasn't strictly necessary, using the following commands:

````
composer create-project laravel/Projet-ECommerce
````

I also had to update my version of Node.js using nvm use 18.

For the database, I chose MySQL, which is the database management system (DBMS) with which I'm most comfortable and with which I've worked the most in the past.

I created the tables and columns based on the design file produced by the group. It wasn't particularly complicated, except for the intermediate tables with pivot values, which required a bit of extra research (for example, orders_product and users_product).

Command used for database & Factory/Seeder :

````
php artisan make:migration
````
````
php artisan make:model
````
````
php artisan migrate
````
````
php artisan make:migration exemple_de_migration --table=Exemple
````
````
php artisan make:factory --model=Exemple
````
````
php artisan make:seeder ExempleSeeder
````
````
php artisan db:seed --class=ExempleSeeder
````
````
php artisan migrate:fresh
````
````
php artisan migrate:fresh --seed
````

I took the initiative of filling out my database of Factory and Seeders.

As far as CRUD is concerned, I followed the following procedure :

Create controllers (example : 
````
php artisan make:controller UserController
````
)
Create requests (example : 
````
php artisan make:request StoreUserRequest
````
)
Create resources (example : 
````
php artsan make:resource UserResource
````
).


<img src="{https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white}" />
<img src="{https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white}" />
<img src="{https://img.shields.io/badge/MariaDB-003545?style=for-the-badge&logo=mariadb&logoColor=white}" />

