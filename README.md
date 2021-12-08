
# Sibed Invoice Tracker

A web application for tracking invoices for transit trucks from Kenya to Uganda after delivery of the product.

## Installation

- Clone the repository
- Copy .env.example to .env
- Set the DB_ environment variables in .env file
- Create a database with the name specified in DB_DATABASE
- ```composer install```
- ```php artisan key:generate```
- Migrate and seed the database with ```php artisan migrate:fresh --seed```
- You can now register and log in

## Built With

* [Laravel](https://laravel.com/) - The web framework used
* [PHP](https://www.php.net/) - Framework language
* [Livewire](https://laravel-livewire.com/) - Scripting language




