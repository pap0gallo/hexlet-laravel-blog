test:
	php artisan test

console:
	php artisan tinker

prepare:
	php artisan package:discover --ansi
	php artisan migrate

start:
	php artisan serve
