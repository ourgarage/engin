PROJECT ?= engin

init_dev: composer_install database_create migrations_seeds npm_yarn_gulp
	
composer_install:
	php composer.phar install
	
database_create:
	mysql -u homestead -p
	CREATE DATABASE ${PROJECT};
	exit;
	
migrations_seeds:
	php artisan migrate:refresh --seed
	
npm_yarn_gulp:
	npm install
	yarn
	gulp
