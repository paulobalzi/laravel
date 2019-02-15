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
