#!/bin/sh

composer install
./db/create.sh
./db/load.sh
./yii migrate --migrationPath=@yii/rbac/migrations
./yii rbac/init
