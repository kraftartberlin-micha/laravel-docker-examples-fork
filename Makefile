init:
	docker compose -f compose.dev.yaml down
# Hint: adjust the UID and GID variables in the .env file to match your user ID and group ID.
# You can find these by running id -u and id -g in the terminal.
	mv .env.example .env
	docker compose -f compose.dev.yaml build --no-cache
	docker compose -f compose.dev.yaml up -d
	docker compose -f compose.dev.yaml exec workspace php artisan cache:clear
	docker compose -f compose.dev.yaml exec workspace php artisan key:generate
	docker compose -f compose.dev.yaml exec workspace php artisan config:cache
	docker compose -f compose.dev.yaml exec workspace php artisan migrate
# dont forget (cant run from outside (npm in container not found), maybe an issue with user or permission):
	# docker compose -f compose.dev.yaml exec workspace bash
	# composer install && npm install && npm run dev
	docker compose -f compose.dev.yaml up -d # restarting for changed env settings
