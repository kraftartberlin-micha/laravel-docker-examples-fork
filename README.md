# Laravel Playground
forked docker example to learn laravel

# Install
## Prepare env
```bash
mv .env .env.backup
cp .env.example .env 
```
### Hint
Adjust the UID and GID variables in the .env file to match your user ID and group ID. You can find these by running id -u and id -g in the terminal.

## Init app
```bash
make init
docker compose -f compose.dev.yaml exec workspace bash
composer install
npm install
npm run dev
```

# Run
## Open browser
http://localhost/

### Hint
If you see 502 Error, just wait for full startup

# Dev
## dumping variables
### dump
```
dump($var);
```
### dump and die
```
dd($var);
```
## route handling
routes are used in/after bootstrapping and preparing services.

you can define route with views, controllers/actions or closures

### list all routes
```make routelist```
