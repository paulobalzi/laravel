<?php

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('filho');
});

Route::get('/nome', 'MeuControlador@getNome');

Route::get('/idade', 'MeuControlador@getIdade');

Route::get('/multiplicar/{n1}/{n2}', 'MeuControlador@multiplicar');

Route::get('/nome/{id}', 'MeuControlador@getNomeById');

// cria todas as rotas para o controller
Route::resource('/cliente', 'ClientController');

Route::get('minha-view', function() {
    return view('minha_view')
        ->with('nome', 'paulo')
        ->with('sobrenome', 'sauro');
});

// Route::get('minha-view/{nome}/{sobrenome}', function($nome, $sobrenome) {
//     return view('minha_view')
//         ->with('nome',$nome)
//         ->with('sobrenome', $sobrenome);
// });
Route::get('minha-view/{nome}/{sobrenome}', function($nome, $sobrenome) {
    // $params = ['nome' => $nome, 'sobrenome' => $sobrenome];
    // return view('minha_view', $params);

    return view('minha_view', compact('nome', 'sobrenome'));
});

Route::get('/nao-existe', function() {
    if (View::exists('nao-existe')) {
        return view('nao-existe');
    } else {
        return view('error-404');
    }
});
