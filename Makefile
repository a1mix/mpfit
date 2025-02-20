DOCKER_COMPOSE = docker-compose -f ./docker/docker-compose.yml
PHP_CONTAINER = app
ARTISAN = docker exec -it $(PHP_CONTAINER) php artisan

# Запуск контейнеров
up:
	$(DOCKER_COMPOSE) up -d

# Остановка контейнеров
down:
	$(DOCKER_COMPOSE) down

# Остановка и удаление контейнеров с томами
clean:
	$(DOCKER_COMPOSE) down --volumes

# Установка зависимостей Composer
install:
	docker exec -it $(PHP_CONTAINER) composer install

# Выполнение миграций и сидеров
migrate:
	$(ARTISAN) migrate --seed

# Пересоздание базы данных
refresh:
	$(ARTISAN) migrate:refresh --seed

# Запуск тестов
test:
	$(ARTISAN) test

# Открытие bash в контейнере app
bash:
	docker exec -it $(PHP_CONTAINER) bash

# Просмотр логов
logs:
	$(DOCKER_COMPOSE) logs -f

# Перезапуск контейнеров
restart:
	$(DOCKER_COMPOSE) restart

# Помощь
help:
	chcp 65001
	@echo "Использование: make [цель]"
	@echo ""
	@echo "Цели:"
	@echo "  up        - Запуск контейнеров"
	@echo "  down      - Остановка контейнеров"
	@echo "  clean     - Остановка и удаление контейнеров с томами"
	@echo "  install   - Установка зависимостей Composer"
	@echo "  migrate   - Выполнение миграций и сидеров"
	@echo "  refresh   - Пересоздание базы данных"
	@echo "  test      - Запуск тестов"
	@echo "  bash      - Открытие bash в контейнере app"
	@echo "  logs      - Просмотр логов"
	@echo "  restart   - Перезапуск контейнеров"
	@echo "  help      - Показать это сообщение"

.PHONY: up down clean install migrate refresh test bash logs restart help
