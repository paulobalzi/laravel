<?php

// hasOne
// mecessário seguir a nomenclatura definido pelo Laravel
use Illuminate\Database\Eloquent\Model;

class CLiente extends Model
{
    public function endereco()
    {
        return $this->hasOne('App\Endereco');
    }
}

// belongsTo

// eu consigo inserir um endereco para um cliente através do relacionamento. Não
// precisando informar a chave primário do cliente
$c = new Cliente()
$c->endereco()->save($objEndereco)

// lazy loader (preguiçoso)
// só  carrega quando necessário
// poupa memória e recursosw

$enderecos = Endereco::with(['cliente'])->get();

// ---------------------------------------------------------------------------------------------------------------------
// UM PARA MUITOS

// Criando um seeder
// > php artisan make:seeder CategoriaSeeder

// file: database/seeds/CategoriaSeeder.php

use Illuminate\Database\Seeder;
class CategoriaSeeder extends Seeder
{
    public function run()
    {
        DB::table('categorias')->insert(['nome' => 'Roupas']);.
        DB::table('categorias')->insert(['nome' => 'Sapatos']);.
        ...etc
    }
}

// Depois de criado a sseder, necessário adicionar a classe de seeder no método
// run da classe DatabaseSeeder
// file: database/seeds/DatabaseSeeder.php
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(CategoriaSeeder::class);
        $this->call(ProdutoSeeder::class);
    }
}

// executar o seed
// > php artisan db:seed

// Relacionamento belongsTo
// Exemplo:
// Categoria(1) -> (N)Produtos
// Produtos(1) -> (1)Categoria
namespace App;
use Illuminate\Database\Eloquent\Model;
class Produto extends Model
{
    function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }
}
