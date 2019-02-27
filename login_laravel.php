<?php
// LOGIN LARAVEL

// criar toda autenticação
> php artisan make:auth

// Rotas
// file: web.php
// adiciona todas as rotas necessárias para a autenticação
Auth::routes();

protected $routeMiddleware = [
    // middleware a autenticação
    'auth' => \App\Http\Middleware\Authenticate::class,
    ...
];

// criando novo controlador
php artisan make:controller ProdutoControlador

namespace App\Http\Controllers;
use Illuminate\Http\Request;
class ProdutoControlador extends Controllers
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // code here...
    }
}

// ----------------------
// Redirecionar para outra controller após login

// Na pasta App/Http/Controllers/Auth
// file: LoginController.php
// o método
protected $redirectTo = '/home';
// informa o redirecionamento.
// é só alterar a rota

// ----------------------
// Verificando se o usuaŕio está logado

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartamentoController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            // pega usuário logado
            $user = Auth::user();
        } else {
            // code here...
        }
    }
}

// -----------------
// Verificando usuário na view

@auth
    // se logado
@endauth

@guest
    // quando não logado
@endguest
