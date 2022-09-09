## Sobre

A ideia do sistema é a captura de interações que ocorrem em lives do TikTok.

As interações são monitoradas através de um projeto desenvolvido em python (https://github.com/leoblanski/tiktok_live_monitor_python), onde grava via API informações como de presentes doados, quantidade de likes, comentários, tempo de live e assim por diante.

Este repositório além da API, disponibilizará um painel onde será possível verificar essas informações em tempo real.


## Inicialização do projeto

### Passo a passo

Faça o clone do projeto executando:

```sh
git clone https://github.com/leoblanski/tiktok_monitor.git
```

Acesse o projeto

```sh
cd tiktok_monitor
```

Crie o Arquivo .env (Todas as configurações necessárias já estão no env.example)
```sh
cp .env.example .env
```

Suba os containers do projeto
```sh
docker-compose up -d
```

Acessar o container
```sh
docker-compose exec app bash
```

Instalar as dependências do projeto
```sh
composer install
```

Gerar a key do projeto Laravel
```sh
php artisan key:generate
```

Execute as migrations do projeto
```sh
php artisan migrate
```

Para que seja possível o envio dos e-mails, precisa iniciar o Worker dos Jobs, para isso execute:
```sh
php artisan queue:work
```

Acesse o projeto
[http://localhost:8989](http://localhost:8989)
