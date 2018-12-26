<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ola', function () {
    return view('hello');
});

Route::get('/nome/{nome}/{sobrenome}', function($nome, $sn) {
    return "<h1>ola $nome $sn</h1>";
});

// restringindo o tipo do parametro da url
// nesse caso, estou restringindo para somente numero
Route::get('/nome-com-regra/{nome}/{n}', function($nome, $n) {
    for($i=0; $i<$n; $i++) {
        echo "<h1>Olá ${nome}</h1>";
    }
})->where('n', '[0-9]{1}')->where('nome', '[a-z]+');

// parametro opcional
// colocar "?" no final do parametro;
// não esquecer de fazer os tratamentos necessários
Route::get('/nome-opcional/{nome?}', function($nome = null) {
    if (isset($nome)) {
        echo "<h1>Olá ${nome}</h1>";
    } else {
        echo "Sem nome";
    }
});

// agrupamento
Route::prefix('app')->group(function() {
    Route::get("/", function() {
        return "Pagina principal do APP";
    });
    Route::get("profile", function() {
        return "Pagina PROFILE";
    });
    Route::get("about", function() {
        return "Pagina ABOUT";
    });
});

// redirecionamento
// 301 codigo HTTP (link removido)
Route::redirect('/aqui', '/ola', 301);

// Route::get('/hello', function () {
//     return view('hello');
// });
// outra maneira de chamar uma view
// (<rota>,<blade-file>)
Route::view('/hello', 'hello');

// passando parametros a partir da rota para uma view
// Route::view('/hello2', 'hello_name', ['nome' => 'Balzi', 'sobrenome' => 'Paulo']);

// passando parametros pela url para uma view
Route::get('/hello2/{nome}/{sobrenome}', function($nome, $sobrenome) {
    return view('hello_name', ['nome' => $nome, 'sobrenome' => $sobrenome]);
});
