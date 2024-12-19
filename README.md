# Line car website
___
This project was set up to have a nice, easy to use dashboard to accompany our line-following robot car. We made this car for a project at Fontys Hogeschool (ICT).

## Instructions to run
To run this project locally, follow the following steps:
1. Install [Laragon](https://laragon.org)
2. Run `git clone https://github.com/MoosMas/lijnauto-website.git` in the laragon/www directory
3. Start Laragon
4. Open this project in an editor
5. Run `cp .env.example .env`
6. Open .env and enter the API key you wish to use and the database credentials
7. Run `composer install`
8. Run `php artisan key:generate`
9. Run `php artisan migrate [--seed]` (create database if necessary)
10. Run `npm install`
11. Run `npm run dev`
12. Run `php artisan serve`
13. Open the address in the browser