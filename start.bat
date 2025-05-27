@echo off
echo Pokrecem instalaciju Composer paketa...
composer install

echo Pravimo simbolicki link za storage...
php artisan storage:link

echo Pokretanje migracija i seed-ovanje baze...
php artisan migrate --seed

echo Pokretanje lokalnog Laravel servera...
php artisan serve

pause
