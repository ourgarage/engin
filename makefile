init_dev: composer_install db_create env_copy migrations seeds init_front key_generate

init_dev_with_db: composer_install db_recreate env_copy migrations seeds init_front key_generate

composer_install:
	php composer.phar install

db_recreate:
	mysql -u homestead -psecret -e "DROP DATABASE IF EXISTS engin;";
	mysql -u homestead -psecret -e "CREATE DATABASE engin CHARACTER SET utf8 COLLATE utf8_general_ci; GRANT ALL PRIVILEGES ON engin.* TO engin@localhost IDENTIFIED BY 'engin';";
	exit;

db_create:
	mysql -u homestead -psecret -e "CREATE DATABASE IF NOT EXISTS engin CHARACTER SET utf8 COLLATE utf8_general_ci; GRANT ALL PRIVILEGES ON engin.* TO engin@localhost IDENTIFIED BY 'engin';";
	exit;

env_copy:
	cp .env.example .env
	
migrations:
	php artisan migrate:refresh

seeds:
	php artisan db:seed
	
init_front:
	yarn install --no-bin-links
	gulp

key_generate:
	php artisan key:generate

clean:
	php artisan clear-compiled
	php artisan cache:clear
	php artisan config:clear
	php artisan debugbar:clear
	php artisan route:clear
	php artisan view:clear

