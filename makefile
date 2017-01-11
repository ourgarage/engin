PROJECT ?= engin

ENV_SETTINGS ?= "
	APP_ENV=local
	APP_KEY=
	APP_DEBUG=true
	APP_LOG_LEVEL=debug
	APP_URL=http://localhost

	DB_CONNECTION=mysql
	DB_HOST=127.0.0.1
	DB_PORT=3306
	DB_DATABASE=${PROJECT}
	DB_USERNAME=homestead
	DB_PASSWORD=secret

	BROADCAST_DRIVER=log
	CACHE_DRIVER=redis
	SESSION_DRIVER=redis
	QUEUE_DRIVER=sync

	REDIS_HOST=127.0.0.1
	REDIS_PASSWORD=null
	REDIS_PORT=6379

	MAIL_DRIVER=smtp
	MAIL_HOST=mailtrap.io
	MAIL_PORT=2525
	MAIL_USERNAME=null
	MAIL_PASSWORD=null
	MAIL_ENCRYPTION=null

	PUSHER_KEY=
	PUSHER_SECRET=
	PUSHER_APP_ID=
"

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
	