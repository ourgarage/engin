init_dev:

PROJECT ?= engin

NGINX_SETTINGS ?= "
	server {
		listen   80;
		server_name ${PROJECT}.dev www.${PROJECT}.dev;
		access_log /home/mv/www/${PROJECT}.dev/logs/access.log;
		error_log /home/mv/www/${PROJECT}.dev/logs/error.log;
		autoindex off;
		allow all;
	 
		gzip on;
		gzip_types text/plain text/css application/json application/x-javascript text/xml application/xml application/xml+rss text/javascript application/javascript;
	 
		location ~ \.php$ {
			try_files $uri =404;
			fastcgi_split_path_info ^(.+\.php)(/.+)$;
			root /home/mv/www/${PROJECT}.dev/html/public/;
			# NOTE: You should have "cgi.fix_pathinfo = 0;" in php.ini
			fastcgi_pass unix:/var/run/php/php7.0-fpm.sock;
			fastcgi_buffers 16 16k;
			fastcgi_buffer_size 32k;
			#include fastcgi_params;
		include fastcgi.conf;
		}
		location / {
			index  index.php index.html;
			root /home/mv/www/${PROJECT}.dev/html/public/;
			rewrite ^/(.*)/$ /$1 redirect;
			if (!-e $request_filename){
				rewrite ^(.*)$ /index.php;
			}
	 
		}
	}
"

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
	
nginx_settings:
	sudo echo ${NGINX_SETTINGS} > /etc/nginx/sites-available/${PROJECT}.conf
	sudo n -s /etc/nginx/sites-available/${PROJECT}.conf /etc/nginx/sites-enabled/${PROJECT}.conf
	sudo services nginx restart
	
env_create:
	echo ${ENV_SETTINGS} > .env
	php artisan key:generate
	