<?php

// classe DB
use Illuminate\Support\Facadees\DB;

>> file: routes/web.php
Route::get('/categorias', function() {
    // recupera os dados da tabela "categorias"
    DB::table('categorias')->get();
    // retorna todos os nomes
    DB::table('categorias')->pluck('nome');
});
----------------------------------------------------------------------------------------------------
>>> WHERE
$cats = DB::table('categorias')->where('id',1)->get();
// retorna somente um elemento
$cats = DB::table('categorias')->where('id',1)->first();
----------------------------------------------------------------------------------------------------
>>> WHERE AVANÇADO
// usando o like
// where(<atributo>, <function>, <expressao>)
$cats = DB::table('categorias')->where('nome','like', '%p%')->get();

$cats = DB::table('categorias')->where('nome','paulo')->orWhere('id', 6)->get();
$cats = DB::table('categorias')->whereBetween('id',[1,2])->get();
$cats = DB::table('categorias')->whereNotBetween('id',[1,2])->get();
$cats = DB::table('categorias')->whereIn('id',[1,2])->get();
$cats = DB::table('categorias')->whereNotIn('id',[1,2])->get();
// where AND
$cats = DB::table('categorias')->where([
    ['nome','paulo'],
    ['id', 5]
])->get();
----------------------------------------------------------------------------------------------------
>>> ORDENANDO OS DADOS

$cats = DB::table('categorias')->orderBy('nome')->get();
// decrescente
$cats = DB::table('categorias')->orderBy('nome', 'desc')->get();
----------------------------------------------------------------------------------------------------
>>> INSERINDO REGISTROS
DB::table('categorias')->insert([
    ['nome' => 'Alimentos'],
    ['nome' => 'informatica'],
    ['nome' => 'cozinha']
]);
// insere e retorno o ID do registro na tabela
DB::table('categorias')->insertGetId([
    ['nome' => 'carros']
]);
----------------------------------------------------------------------------------------------------
>>> ATUALIZANDO REGISTROS
DB::table('categorias')->where('id', 10)->update(
    [
        'nome' => 'roupas infantis',
        'preco' => '10'
    ]
);
----------------------------------------------------------------------------------------------------
>>> APAGANDO REGISTROS
DB::table('categorias')->where('id', 10)->delete();

