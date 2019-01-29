<?php
>>> VALIDAÇÃO DE FORMULARIOS

>> file: controller
public function store(Request $request) {
    // metodo validate existente no objeto Request
    $request->validate([
        'nome' => 'required'
    ]);

    $cliente = new Cliente();
    $cliente->nome = $request->input('nome');
    $cliente->nome = $request->input('idade');
    $cliente->nome = $request->input('endereco');
    $cliente->save();
}

>> file: view
// Na view é possível visualizar os erros
> {{ var_dump($errors) }}
