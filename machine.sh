#!/usr/bin/env bash

source <(sed -E -n 's/[^#]+/export &/ p' .env)


LARAPATH="$(pwd)/laradock"
COMMAND=$1


cd ${LARAPATH}
case "$COMMAND" in
    "up" )
    docker-compose up -d mysql nginx ;;

    "down" )
    docker-compose down ;;

    "mysql" )
    mysql -u${DB_USERNAME} -p${DB_PASSWORD} ${DB_DATABASE} -P${DB_PORT} -hlocalhost ;;

    "workspace" )
    docker-compose exec --user="laradock" workspace bash ;;

    "workspace_root" )
    docker-compose exec workspace bash ;;

    "container" )
    docker-compose exec $2 bash ;;
esac