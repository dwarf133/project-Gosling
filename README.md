# project Gosling

### Installation:

Должны быть установленны все необходимые зависимости:
composer, php >= 8.1, php-pgsql, php-curl, php-intl,

```shell
git clone
```
```shell
composer install
```
```shell
docker-compose up -d
```
```shell
cp .env.exmple .env
```
```shell
php artisan config:clear
```
```shell
php artisan migrate --seed
```

Точка входа в приложение /dashboard

стандартный логин/пароль для админа: admin@mail.ru/admin

Лендинг находится в [отдельном репозитории](https://github.com/dwarf133/project-Rayan), точка входа / , инструции по тому как его установить находятся в ридми файле репозитория, между собой они связаны через конпку "Войти".

### Database schema:
![database schema](storage/readmy/gosling.png "database schema")
