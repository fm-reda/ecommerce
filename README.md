
# Ecommerce

Ecommerce web app for shoping

![alt text](https://github.com/KhalidLam/instagramClone/blob/master/ecommerce.jpg)

## Getting started
1. Clone project `git clone https://github.com/fm-reda/ecommerce.git`
2. Go to the folder `cd ecommerce`
3. Install composer `composer install`
4. Install npm package `npm install`
5. Copy and edit .env file from .env.example `cp .env.example .env`
6. Generate project key `php artisan key:generate`
7. Create an empty database `test` for example
8. In the .env file, change database information `DB_DATABASE=ecommerce`
9. Migrate the database `php artisan migrate`
10. Create symbolic link for storage `php artisan storage:link`
11. Run project `php artisan serve`
