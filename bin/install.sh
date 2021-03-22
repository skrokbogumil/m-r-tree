#!/bin/bash

ROOT=$(readlink -f "$(dirname $0)/../docker")

cd $ROOT

docker-compose exec php composer install

cat <<EOM

Instalation complite!
EOM

exit 0
