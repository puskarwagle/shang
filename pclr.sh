#!/bin/bash

php artisan cache:clear ;
php artisan route:clear ;
php artisan view:clear ;
php artisan config:clear ;
php artisan optimize:clear
#composer dumpautoload
