# XiaoDingDong Project Documentation
* Raphael Alexander Lesmana (2540128114)
* Yennifer Wilanata (2540123725)

## Usage
1. Unzip `main.zip`. Enter the directory `webprog-lab_2540128114_2540123725`.
2. Copy the contents of `.env.example` into a new file called `.env`. Fill out the appropriate credentials for the database in lines 11-15. If you do not have a database, then you need to create it first.
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=la05_lab
DB_USERNAME=la05_lab
DB_PASSWORD=
```
3. Run the following commands:
```
composer install
php artisan migrate:fresh --seed
php artisan storage:link
php artisan key:generate
```

4. The seeder generates 22 dummy users, 10 of which are regular users, another 10 of which are admins, and 2 have the following email addresses:
    * `example@gmail.com`  
    * `admin@gmail.com`  
5. Run the server using `php artisan serve`, and navigate to `localhost:8000/`.
6. All default user accounts have their passwords set to `password`. Use this to log in.

Asset source URLs can be found in [SOURCES.md](./SOURCES.md)