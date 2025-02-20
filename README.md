# Запуск приложения 

## Установка и запуск

1. Склонируйте репозиторий:
   ```bash
   git clone https://github.com/aimix/mpfit.git
   cd mpfit

2. Создайте файл .env на основе .env.example:
    ```bash
    cp .env.example .env
3. Запустите Docker-контейнеры:
    ```bash
   docker-compose up -d
4. Установите зависимости Composer:
    ```bash
   docker exec -it app composer install
5. Выполните миграции и сидеры:
    ```bash
   docker exec -it app php artisan migrate --seed
6. Приложение будет доступно по адресу:
   http://localhost:8888

### Также можно использовать инструкции из Makefile

Все инструкции доступны по команде make help
