# PRACTICAL TEST – PHP

## Installation

1. Install backend depedencies.

    ```
    $ cd php_ashen
    $ composer install
    ```
2. Edit configuration files.

    ```
    $ cp .env.example .env
    $ nano .env
    ```
3. Database setup and insert fake data

    ```
    $ php artisan migrate:fresh --seed
    ```
4. Generate an application key

    ```
    $ php artisan key:generate
    ```
5. Serve the project

    ```
    $ php artisan serve
    ```

## Usage

Credentials 

```
email : parker@sales.com
password : parker@123
```

## Note

If the front design does not load properly, please run

 ```
$ npm install
$ npm run dev
```

## Author

* **[Ashen Udithamal](https://www.linkedin.com/in/ashenud/)** 
