<!DOCTYPE html>
<html>
<head>
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}"> --}}
    {{-- mesma coisa --}}
    <link rel="stylesheet" type="text/css" href="{{URL::to('css/app.css')}}">
    <title>Template blade (@yield('titulo'))</title>
</head>
<body>
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    {{-- definindo a seção "barralateral" --}}
    @section('barralateral')
        barra lateral do PAI
    {{-- @show faz com que a seção seja renderizada --}}
    @show
    <div>
        {{-- estou definindo que aqui irei mostrar o conteudo da secao "conteudo" definido no filho --}}
        @yield('conteudo')
    </div>
</body>
</html>
