# Laravel

## Instalação
```shell
composer create-project --prefer-dist laravel/laravel projeto1
```
## Pastas

Arquivos da aplicação
```
|-- app
|   |-- Console
|   |-- Exceptions
|   |-- Http
|   |   |-- Controllers
|   |   |   `-- Auth
|   |   `-- Middleware
|   `-- Providers
```

Inicialização do aplicação
```
|-- bootstrap
|   `-- cache
```

```
|-- config
|-- database
|   |-- factories
|   |-- migrations
|   `-- seeds
|-- public
|   |-- css
|   |-- js
|   `-- svg
|-- resources
|   |-- js
|   |   `-- components
|   |-- lang
|   |   `-- en
|   |-- sass
|   `-- views
|-- routes
`-- storage
    |-- app
    |   `-- public
    |-- framework
    |   |-- cache
    |   |   `-- data
    |   |-- sessions
    |   |-- testing
    |   `-- views
    `-- logs
```
# Rotas

# Tips
* tree -d -L 5 -I "vendor|tests"
* composer create-project --prefer-dist laravel/laravel <nome-projeto>
* php artisan serve --host=192.168.1.200
