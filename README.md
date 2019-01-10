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

# Views (blade)
```
@extends('path.to.file')
Inserido no arquivo filho
```
```
@yield
```
```
@section('name_of_section) ... @endsection
```
```
@switch($opcao)
    @case(1):
        //code; break
    @case(2):
        //code; break
    @default:
        //default action
@endswitch
```
```
@foreach
$loop->first | #loop->last | $loop->index | $loop->count | $loop->remaining
```
# Tips
* tree -d -L 5 -I "vendor|tests"
* composer create-project --prefer-dist laravel/laravel <nome-projeto>
* php artisan serve --host=192.168.1.200
