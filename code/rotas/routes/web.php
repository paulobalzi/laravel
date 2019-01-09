<?php

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('filho');
});

Route::get('/produtos', 'ProdutoController@listar');
Route::get('/produtos/show/{{id}}', 'ProdutoController@show');
