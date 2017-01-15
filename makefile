init_dev: composer_install database_create env_copy migrations_seeds init_front key_generate
	
composer_install:
	php composer.phar install
	
database_create:
	mysql -u homestead -psecret -e "CREATE DATABASE IF NOT EXISTS engin CHARACTER SET utf8 COLLATE utf8_general_ci; GRANT ALL PRIVILEGES ON engin.* TO engin@localhost IDENTIFIED BY 'engin'";
	exit;

env_copy:
	cp .env.example .env
	
migrations_seeds:
	php artisan migrate:refresh --seed
	
init_front:
	yarn install --no-bin-links
	gulp

key_generate:
	php artisan key:generate
