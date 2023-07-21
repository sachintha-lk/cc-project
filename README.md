# EducateLanka - group3-CC-project

Educate Lanka is a laravel based Learing Management System to help the Sri Lankan school education system.

## Getting Started

### Prerequisites

Node JS, NPM, PHP, Composer, Laravel

### Installation

1.  Clone the github repository.

2.  Install the dependencies.

    ```composer
    composer install
    ```

    ```npm
    npm install
    ```

    Build with vite

    ```npm
    npm run build
    ```
3.  Create the .env file by copying .env.example

5.  Create a database and configure the .env file.
    For this either use a Sqlite database or a MySQL database.
    Follow instructions in configuring the env file: https://laravel.com/docs/10.x/database
6.  Run the migrations.
    ```bash
    php artisan migrate
    ```
7.  Run the seeder.

    ```bash
    php artisan db:seed
    ```

8.  Run the dev server.

    ```bash
    npm run dev
    ```

    ```bash
    php artisan serve
    ```
