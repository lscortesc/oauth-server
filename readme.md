# Oauth Server

Base repository to create an Oauth2 server, it is written in Laravel with Passport component

## Install

1. Go to project root folder and run
```shell
composer install
```
2. Configure DB Connection in `.env` file
3. Run migrations
```shell
php artisan migrate
```
4. Install passport component
```shell
php artisan passport:install
```
5. Save clients secrets. You will see something like this:
```shell
Encryption keys generated successfully.
Personal access client created successfully.
Client ID: 1
Client Secret: CLIENT_SECRET_1
Password grant client created successfully.
Client ID: 2
Client Secret: CLIENT_SECRET_2
```
6. If you are deploying Passport to your production servers for the first time, you will likely need to run the `passport:keys` command.
```shell
php artisan passport:keys
```

Also you can visit the official documentation [here](https://laravel.com/docs/5.5/passport)