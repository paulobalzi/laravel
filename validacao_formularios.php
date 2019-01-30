<?php
>>> VALIDAÇÃO DE FORMULARIOS

>> file: controller
public function store(Request $request) {
    // metodo validate existente no objeto Request
    $request->validate([
        'nome' => 'required|min:5'
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
------------------------------------------------------------------------------------------------------------------------
>> Unique
// unique:<nome-da-tabela>
$request->validate([
    'nome' => 'required|min:5|max:10|unique:clientes'
]);
------------------------------------------------------------------------------------------------------------------------
>> Valindando mais de um campo
// validar email: regra => "email"
$request->validate([
    'nome' => 'required|min:5|max:10|unique:clientes',
    'idade' => 'required',
    'email' => 'required|email'
]);
------------------------------------------------------------------------------------------------------------------------
>> CUSTOMIZAR MSG DE ERROS
$regras = [
    'nome' => 'required|min:5|max:10|unique:clientes',
    'idade' => 'required',
    'email' => 'required|email'
];
// <campo>.<regra> => <text-msg.
$messages = [
    // personalizando a msg para a regra required para qualquer campo.
    // utilizando a tag ":attribute" para personalizar o campo
    'required' => 'O atributo :attribute não pode estar em branco',
    'nome.required' => 'Colocar a msg de erro aqui!',
    'nome.min' => 'Colocar a msg de erro aqui!'
]
$request->validate($regras, $messages);
------------------------------------------------------------------------------------------------------------------------
>> Msg nos campos no formulario
// file: na view
// regra bootstrap. "is-invalid" necessário para ficar formatado
<input type="text" id="nome" class="form-control {{ $errors->has('nome') ? 'is-invalid': ''}}" name="nome">
@if($errors->has('nome'))
    <div class="invalid-feedback">
        {{ $errors->first('nome') }}
    </div>
@endif
