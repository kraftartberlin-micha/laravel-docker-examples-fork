init:
	docker compose -f compose.dev.yaml down
	docker compose -f compose.dev.yaml build --no-cache
	docker compose -f compose.dev.yaml up -d
	docker compose -f compose.dev.yaml exec workspace php artisan cache:clear
	docker compose -f compose.dev.yaml exec workspace php artisan key:generate
	docker compose -f compose.dev.yaml exec workspace php artisan config:cache
	docker compose -f compose.dev.yaml exec workspace php artisan migrate
	docker compose -f compose.dev.yaml up -d # restarting for changed env settings

bash:
	docker compose -f compose.dev.yaml exec workspace bash

routelist:
	docker compose -f compose.dev.yaml exec workspace php artisan route:list --except-vendor
