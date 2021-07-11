start:
	docker-compose up -d
	php artisan serve --host 0.0.0.0 --port 8000

stop:
	docker-compose stop
	sudo kill -9 `sudo lsof -t -i:9001`

setup:
	composer install
	cp -n .env.example .env || true
	touch .env.testing
	cp -n .env .env.testing
	php artisan key:gen --ansi
	php artisan key:generate --env=testing
	docker-compose up -d
	php artisan migrate
	npm install

watch:
	npm run watch

migrate:
	php artisan migrate

console:
	php artisan tinker

log:
	tail -f storage/logs/laravel.log

test:
	php artisan test

deploy:
	git push heroku

lint:
	composer phpcs

route:
	php artisan route:list
