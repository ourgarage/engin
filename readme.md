# ENGINE

This manual is intended for installation Engin to your local server.

## Installation procedure

* Clone this repository (https or ssh)
* Run ```php composer.phar install```
* Rename your .env.example file to .env
* Create new database and user MySQL
* Add in your .env file data to access the MySQL database
* Run ```php artisan key:generate```
* Run ```php artisan migrate```

Installation completed.
