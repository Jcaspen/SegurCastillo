#!/bin/sh

BASE_DIR=$(dirname "$(readlink -f "$0")")
if [ "$1" != "test" ]; then
    psql -h localhost -U segurcastillo -d segurcastillo < $BASE_DIR/segurcastillo.sql
fi
psql -h localhost -U segurcastillo -d segurcastillo_test < $BASE_DIR/segurcastillo.sql
