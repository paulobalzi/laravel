<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    private $produtos = [
        'Notebook',
        'Mouse',
        'Monitor',
        'Disco SSD'
    ];

    public function listar() {
        return view('produtos.list', ['produtos' => $this->produtos]);
    }

    public function show($id) {
        $produto = $this->produtos[$id];
        return view('produtos.show', compact('produto'));
    }
}
