# Makefile for PHP project

.PHONY: up down create sh install test schema-create migrate status

DC = docker compose
DC_EXEC_PHP = $(DC) exec -it ak_invoice_php

up:
	@$(DC) up -d

down:
	@$(DC) down

create: up install schema-destroy schema-create migrate

sh:
	@$(DC_EXEC_PHP) bash

install:
	@$(DC_EXEC_PHP) composer install

test:
	@$(DC_EXEC_PHP) vendor/bin/phpunit

schema-create:
	@$(DC_EXEC_PHP) bin/console doctrine:schema:create --no-interaction

schema-destroy:
	@$(DC_EXEC_PHP) bin/console doctrine:schema:drop --no-interaction

migrate:
	@$(DC_EXEC_PHP) bin/console doctrine:migrations:migrate --no-interaction

status:
	@$(DC_EXEC_PHP) bin/console doctrine:migrations:status
