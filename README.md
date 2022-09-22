# Setup NEW RX

Dockerized laravel application. Using LEMP, Adminer as db web interface. This application is in 2 parts; an API that feeds data to a mobile app and an administrator panel for management of the application.

## Software Requirements

-   Docker

### Configuration

1. Clone the NEW RX repository to your local machine.

2. Create a .env file based off .env.example

3. Start docker engine

4. Build containers
    - docker-compose build
5. Bring up containers in detached mode

    - docker-compose up -d

6. SSH into the lemvan container

    - docker exec -it -u ubuntu newrx /bin/bash

7. Run the following commands

    - composer install
    - php artisan key:generate
    - php artisan migrate


8. Visit the following urls to ensure everything is correctly setup:

    - **[New RX](http://localhost:3000)**
    - **[Adminer DB Interface](http://localhost:3002)**
