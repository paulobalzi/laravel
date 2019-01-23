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
>>> SOFT DELETES
Na migration necessário adicionar o atributo
$table->softDeleltes()
isso irá criar o campo "deleted_at" na tabela, que irá conter o timestamp da deleção

Na model necessário informar que irá usar o softDeletes

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Categoria extends Model
{
    use softDeletes;
    protected $dates = ['deleted_at'];

}

Para acessar a ação de remoção é a mesma da utilização do delete físico
Exemplo:
Route::get('/remover/(id)', function() {
    $cat = Categoria::find($id);
    $cat->delete();
})

Na pesquisa, Categoria::All(), esses registros não irá ser recuperados
Para recuperar tudo, inclusive as excluidas (soft), utilizar o métod:
$categorias = Categoria::withTrashed()->get();
o objeto terá o atributo "trashed" que, se true, ele foi apagado, senão, não.

Somente apagadas
$categorias = Categoria::onlyTrashed()->get();

Para restaurar (restore)
$categoria = Categoria::withTrashed()->find($id)
$categoria->restore()

----------------------------------------------------------------------------------------------------
>>> deleção Permanente
$categoria = Categoria::withTrashed()->find($id)
$categoria->forceDelete();
