<?php

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/nome', 'MeuControlador@getNome');

Route::get('/idade', 'MeuControlador@getIdade');

Route::get('/multiplicar/{n1}/{n2}', 'MeuControlador@multiplicar');

Route::get('/nome/{id}', 'MeuControlador@getNomeById');

// cria todas as rotas para o controller
Route::resource('/cliente', 'ClientController');
