install:
	cp .env.example .env
	docker-compose build --no-cache
	docker-compose up -d
	docker exec artsoft-test-task-laravel-1 composer install
	make generate

generate:
	docker exec artsoft-test-task-laravel-1 php artisan key:generate
	docker exec artsoft-test-task-laravel-1 php artisan migrate --seed

start:
	docker-compose up -d

stop:
	docker-compose down