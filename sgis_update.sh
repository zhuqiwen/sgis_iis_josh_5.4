#!/bin/bash
CURRENT_TIME=`date '+%Y%m%d_%H%M'`
cd ~/sgis_iis_josh_5.4
git pull
mv database/database.sqlite database/database.sqlite.bkup.$CURRENT_TIME
touch database/database.sqlite
php artisan migrate
php artisan db:seed --class=AdminSeeder
php artisan db:seed --class=AlumSeeder
php artisan db:seed --class=ScholarshipSeeder
composer dump-autoload -o
php artisan config:cache
php artisan route:cache