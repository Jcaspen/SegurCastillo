#!/bin/sh

if [ "$1" = "travis" ]; then
    psql -U postgres -c "CREATE DATABASE segurcastillo_test;"
    psql -U postgres -c "CREATE USER segurcastillo PASSWORD 'segurcastillo' SUPERUSER;"
else
    sudo -u postgres dropdb --if-exists segurcastillo
    sudo -u postgres dropdb --if-exists segurcastillo_test
    sudo -u postgres dropuser --if-exists segurcastillo
    sudo -u postgres psql -c "CREATE USER segurcastillo PASSWORD 'segurcastillo' SUPERUSER;"
    sudo -u postgres createdb -O segurcastillo segurcastillo
    sudo -u postgres psql -d segurcastillo -c "CREATE EXTENSION pgcrypto;" 2>/dev/null
    sudo -u postgres createdb -O segurcastillo segurcastillo_test
    sudo -u postgres psql -d segurcastillo_test -c "CREATE EXTENSION pgcrypto;" 2>/dev/null
    LINE="localhost:5432:*:segurcastillo:segurcastillo"
    FILE=~/.pgpass
    if [ ! -f $FILE ]; then
        touch $FILE
        chmod 600 $FILE
    fi
    if ! grep -qsF "$LINE" $FILE; then
        echo "$LINE" >> $FILE
    fi
fi
