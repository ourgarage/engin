init_dev: composer_install database_create migrations_seeds init_front
	
composer_install:
	php composer.phar install
	
database_create:
	mysql -u homestead -p
	CREATE DATABASE engin;
	exit;
	
migrations_seeds:
	php artisan migrate:refresh --seed
	
init_front:
	yarn
	gulp
