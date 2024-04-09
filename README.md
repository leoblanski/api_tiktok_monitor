## About

The idea of the system is to capture interactions that occur during TikTok live streams.

Interactions are monitored through a project developed in Python (https://github.com/leoblanski/tiktok_live_monitor_python), which records information via API such as donated gifts, number of likes, comments, live stream duration, and so on.

In addition to the API, this repository will provide a dashboard where you can view this information in real-time.

## Project Initialization

### Step by Step

Clone the project by executing:

```sh
git clone https://github.com/leoblanski/tiktok_monitor.git
```

Access the project

```sh
cd tiktok_monitor
```

Create the .env file (All necessary configurations are already in the env.example)
```sh
cp .env.example .env
```

Start the project containers
```sh
docker-compose up -d
```

Access the container
```sh
docker-compose exec app bash
```

Install project dependencies
```sh
composer install
```

Generate the Laravel project key
```sh
php artisan key:generate
```

Access the project
[http://localhost:8989](http://localhost:8989)
