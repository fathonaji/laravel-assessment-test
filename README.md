# Laravel Assessment Test

This project is a simple web-based application built as part of a technical assessment.  
It allows users to add, view, and edit product data with real-time updates using AJAX.

https://github.com/fathonaji/laravel-assessment-test

## Features

-   Add new products using a modal form
-   Edit existing product entries
-   Store data in a JSON file (no database required)
-   Display submitted data in rows ordered by datetime submitted (newest first)
-   Automatically calculate total value per item and grand total
-   AJAX-based form submission without page reload

## Tech Stack

-   Laravel 12
-   PHP 8.2+
-   Bootstrap 4
-   jQuery
-   Blade Templates
-   JSON file storage

## Data Storage

Product data is stored internally in a JSON file located at:

storage/app/private/products.json

This approach keeps application data non-public and avoids additional database setup, which is sufficient for the scope of this assessment.

## How to Run Locally

1.  Clone the repository
2.  Install PHP dependencies using Composer:  
    composer install
3.  Copy the environment configuration file:  
    cp .env.example .env
4.  Generate the application key:  
    php artisan key:generate
5.  Run the Laravel development server:  
    php artisan serve
6.  Open the application in your browser:  
    http://127.0.0.1:8000

## Notes

-   No database, migrations, or seeders are used
-   No frontend build tools (Vite / NPM) are required
-   JSON storage was chosen for simplicity and faster setup
