<?php

// ----------------
// MIDDLEWARES
// ---

// requisição | chegada | resposta >> HTTP
//

// > php artisan make:middleware <nome-do-middleare>

// file: arquivo de rota
// aqui, o middleare será executado antes da chamada do controlador

use App\Http\Middlewares\NomeDoMeuMiddleare;
Route::get('/users', 'UsuarioControlador@index')->middleware('NomeDoMeuMiddleare::class');
