@extends('layout.app')

{{-- definindo um valor de variável --}}
@section('titulo', 'filho')

{{-- essa seção irá substituir a secao "barralateral" definido no pai--}}
@section('barralateral')
    {{-- faz com que o valor definido no pai também apareca aqui --}}
    @parent
    <p>barra lateral do FILHO</p>
@endsection

{{-- criando uma seção - conteudo --}}
@section('conteudo')
    <div class="alert alert-primary" role="alert">
        A simple primary alert—check it out!
    </div>
@endsection
