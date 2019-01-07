<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    <title>Template blade (@yield('titulo'))</title>
</head>
<body>
    <div>
        @yield('conteudo')
    </div>

    {{-- scripts --}}
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
</body>
</html>
