#!/bin/bash

echo "=====> Iniciando ambiente de desenvolvimento"

echo "=====> Startando docker mysql"
docker pull mysql:8.0.1
docker run --name my-own-mysql -e MYSQL_ROOT_PASSWORD=giver@123#456 -d mysql:8.0.1

echo "=====> Efetuando criação de usuário no banco"
docker exec -it my-own-mysql bash

mysql
CREATE USER 'api_tiktok_monitor'@'localhost' IDENTIFIED BY 'giver@123#456';
echo "=====> Setando permissões ao usuário"
GRANT ALL PRIVILEGES ON * . * TO 'api_tiktok_monitor'@'localhost';
FLUSH PRIVILEGES;

echo "=====> Startando docker phpmyadmin"
docker pull phpmyadmin/phpmyadmin:latest
docker run --name my-own-phpmyadmin -d --link my-own-mysql:db -p 8081:80 phpmyadmin/phpmyadmin

echo "=====> Acesse o phpmyadmin em http://localhost:8081/"

echo "=====> Startando aplicação"

git pull origin master 
cd ..
php artisan migrate
npm install && npm run dev
php artisan serve