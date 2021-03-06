# Oauth Server

Base repository to create an Oauth2 server, it is written in Laravel with Passport component
and it is consume them by self with login proxy.

![alt text](https://docs.axway.com/bundle/APIGateway_753_OAuthUserGuide_allOS_en_HTML5/page/Content/Resources/Images/docbook/images/oauth/APIgw_Oauth_ex_client_workfl.png "Oauth Server")

### Install

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
6. Configure `.env` file with password client:
```shell
PASSWORD_CLIENT_ID=2
PASSWORD_CLIENT_SECRET=CLIENT_SECRET_2
```
7. If you are deploying Passport to your production servers for the first time, you will likely need to run the `passport:keys` command.
```shell
php artisan passport:keys
```

Also you can visit the official documentation [here](https://laravel.com/docs/5.5/passport)

### Configuration

- You can configure expiration time of a token and also the refresh token in `boot` method of:
```shell
app/Providers/AuthServiceProvider.php
```

- To verify the available routes, run:
```shell
php artisan route:list
```