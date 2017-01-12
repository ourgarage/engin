init_dev: composer_install database_create migrations_seeds init_front env_copy
	
composer_install:
	php composer.phar install
	
database_create:
	mysql -u homestead -e
	CREATE DATABASE engin;
	exit;
	
migrations_seeds:
	php artisan migrate:refresh --seed
	
init_front:
	yarn
	gulp

env_copy:
	cp .env.example .env
	php artisan key:generate
