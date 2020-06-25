# CDLF - API

using [api-platform](https://api-platform.com/)

 just run `docker-compose up -d` then go to `http://localhost:8000` 
 


docker-compose exec php bin/console doctrine:migrations:diff
docker-compose exec php bin/console doctrine:migrations:migrate

docker-compose exec php bin/console doctrine:schema:validate
