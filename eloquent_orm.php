<?php

>>> PREPARANDO AMBIENTE
// criando model "Categoria"
> php artisan make::model Categoria
file: app/Categoria.php
    namespace App;
    use Illuminate\Database\Eloquent\Model;
    class Categoria extends Model {
        // indicando qual a tabela que fará a referência
        protected $table_name = 'categoria';
    }

// opção -m: cria uma migration
> php artisan make::model Categoria -m
----------------------------------------------------------------------------------------------------
>>> RECUPERANDO E INSERINDO DADOS
use App\Categoria;
$cat = new Categoria();
$cat->nome = 'paulo';
$cat->save();

$categorias = Categoria::all();
foreach ($categorias as $c) {
    // mesmo nome do atributo na tabela é o nome do atributo no objeto
    echo "id: {$c->id}";
    echo "nome: {$c->nome}";
}
----------------------------------------------------------------------------------------------------
>>> RECUPERANDO REGISTRO POR ID
$cat = Categoria::find($id);
// caso não exista o id. http error: 404
$cat = Categoria::findOrFail($id);
----------------------------------------------------------------------------------------------------
>>> REMOVENDO E ATUALIZANDO REGISTROS
$cat = Categoria::find($id);
$cat->nome = 'novo nome';
$cat->save();

$cat = Categoria::find($id);
$cat->delete()
----------------------------------------------------------------------------------------------------
>>> UTILIZANDO WHERE
$cat = Categoria::where('nome', $nome)->get();
$cat = Categoria::where('id', '>=', 10)->get();
$cat = Categoria::find('id', [1,2,3])->get();
$cat = Categoria::whereIn('id', [1,2,3])->get();

$cat = Categoria::where('id', '>=', 10)->max('id');
$cat = Categoria::where('id', '>=', 10)->count();
----------------------------------------------------------------------------------------------------


