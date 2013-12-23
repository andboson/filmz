sudo chmod -R 777 app
php app/console doctrine:database:create
php app/console doctrine:schema:update --force
php app/console doctrine:fixtures:load
php app/console assets:install web --symlink