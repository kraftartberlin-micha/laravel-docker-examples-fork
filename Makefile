init:
	docker compose -f compose.dev.yaml down
	docker compose -f compose.dev.yaml build --no-cache
	$(MAKE) startup
	$(MAKE) env
	$(MAKE) cache_clear
	$(MAKE) cache
	$(MAKE) migrate

startup:
	docker compose -f compose.dev.yaml up -d

bash:
	docker compose -f compose.dev.yaml exec workspace bash

env:
	mv .env .env.backup
	cp .env.example .env
	docker compose -f compose.dev.yaml exec workspace php artisan key:generate
	$(MAKE) startup #restart for loading changed sys env

cache:
	docker compose -f compose.dev.yaml exec workspace php artisan config:cache
	docker compose -f compose.dev.yaml exec workspace php artisan route:cache
cache_clear:
	#docker compose -f compose.dev.yaml exec workspace php artisan cache:clear
	#docker compose -f compose.dev.yaml exec workspace php artisan route:clear
	#docker compose -f compose.dev.yaml exec workspace php artisan config:clear
	#docker compose -f compose.dev.yaml exec workspace php artisan view:clear
	#docker compose -f compose.dev.yaml exec workspace php artisan clear-compiled
	docker compose -f compose.dev.yaml exec workspace php artisan optimize:clear

migrate:
	docker compose -f compose.dev.yaml exec workspace php artisan migrate

routelist:
	docker compose -f compose.dev.yaml exec workspace php artisan route:list --except-vendor
