<?php

// ----------------
// MIDDLEWARES
// ---

// requisição | chegada | resposta >> HTTP
//

// > php artisan make:middleware <nome-do-middleare>

// file: arquivo de rota
// aqui, o middleare será executado antes da chamada do controlador

// Exempplo Middleware
use App\Http\Middlewares\NomeDoMeuMiddleware;
Route::get('/users', 'UsuarioControlador@index')->middleware('NomeDoMeuMiddleware::class');

namespace App\Http\Middleware;
use Closure;
use Log;

class PrimeiroMiddleware
{
    public function handle($request, Closure $next)
    {
        log::debug('Passou pelo PrimeiroMiddleware');
        // o comando next é o responsável de chamar o próximo middleware para ser executado.
        // se isso for retirado, somente o middleware invocado será executado
        return $next($request);
    }
}

// ---------------------------------
// Registrando um Middleware

// file: app/Http/kernel.php

// Esses middlewares são chamados antes de toda requisição da aplicação
protected $middleware = [
    \App\Http\Middleware\CheckForMaintenanceMode::class,
    \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
    \App\Http\Middleware\TrimStrings::class,
    \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    \App\Http\Middleware\TrustProxies::class,
];

// Registrando um middleware criado
protected $routeMiddleware = [
    'auth' => \App\Http\Middleware\Authenticate::class,
    'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
    'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
    'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
    'can' => \Illuminate\Auth\Middleware\Authorize::class,
    'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
    'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
    'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
    'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
    'primeiro' => \App\Http\Middleware\PrimeiroMiddleware::class,
];
// depois de configurado, o uso do middleware pode ser feito pelo nome dado
// Exemplo
// file: web.php
use App\Http\Middleware\PrimeiroMiddleware;
// Antes
// Route::get('/users', 'UsuarioControlador@index')->middleware('NomeDoMeuMiddleware::class');
Route::get('/usuarios', 'UsuarioControlador@index')->middleware('primeiro');

// -----------------------------------------------------------------------------
// Chamando o Middleware na controller
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class UsuarioControlador extends Controller
{
    public function __construct() {
        $this->middleware('primeiro');
        // ou
        $this->middleware(\App\Http\Middleware\Primeiro::class);
    }

    public function index() {
        // code here...
    }
}

// -----------------------------------------------------------------------------
// Aqui temos os middlewares que são executados quando:
// web -> quando as rotas definidas na aplicação são executadas
// api -> quando as rotas (REST) definidas são requisitadas
protected $middlewareGroups = [
    'web' => [
        // A ordem dentro do array é respeitado.
        \App\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        // \Illuminate\Session\Middleware\AuthenticateSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \App\Http\Middleware\VerifyCsrfToken::class,
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
        // aqui estou configurando que o meu middleware será executado para toda requisição da aplicação
        \App\Http\Middleware\PrimeiroMiddleware::class
    ],

    'api' => [
        'throttle:60,1',
        'bindings',
    ],
];

// Trabalhando com 2 (ou mais) middlewares
protected $routeMiddleware = [
    'auth' => \App\Http\Middleware\Authenticate::class,
    'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
    'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
    'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
    'can' => \Illuminate\Auth\Middleware\Authorize::class,
    'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
    'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
    'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
    'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
    'primeiro' => \App\Http\Middleware\PrimeiroMiddleware::class,
    'segundo' => \App\Http\Middleware\SegundoMiddleware::class,
];

// é possível configurar mais de um middleware direto na rota
Route::get('/usuarios', 'UsuarioControlador@index')->middleware('primeiro', 'segundo', 'etc');

// -----------------------------------------------------------------------------
// Passando parametros para os middlewares

namespace App\Http\Middleware;
use Closure;
use Log;
class TerceiroMiddleware
{
    public function handle($request, Closure $next, $nome, $idade)
    {
        Log::debug("bla bla bla [ nome = {$nome}]");
        return $next($request);
    }
}

// na rota
// passando o parametro -> terceiro:jogo
Route::get('/terceiro', function() {
    return 'Passou pelo terceiro';
})->middleware('terceiro:jogo,20');

// -----------------------------------------------------------------------------
// Nomeando uma rota
Route::get('/exemplo', function() {
    return 'Passou pelo terceiro';
})->name('nome-da-rota');
