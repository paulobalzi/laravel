<?php
// LOGIN LARAVEL

// criar toda autenticação
> php artisan make:auth

// Rotas
// file: web.php
// adiciona todas as rotas necessárias para a autenticação
Auth::routes();
