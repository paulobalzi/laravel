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

// -----------------
// Autenticação

// file: app/config/auth.php
'guards' => [
    // autenticação via aplicação
    'web' => [
        // o modo como a autenticação será mantida
        // onde será armazenado os dados do usuário logado (chave da autenticação)
        'driver' => 'session',
        // tabela que irá armazenar os dados do usuário
        'provider' => 'users',
    ],
    // autenticação da api
    'api' => [
        // token. Chave criada no servidor autenticando o usuário. Essa chave é passada para o cliente.
        // e para cada requisição do usuário, esse token é enviado junto, para ser validado pelo servidor
        // Para o token, existem algumas outras regras a ser avaliadas
        'driver' => 'token',
        'provider' => 'users',
    ],
],

'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\User::class,
        ],
        // ****************
        // Explicação: o código abaixo utiliza o query builder, mas por padrão
        // é selecionado o ORM Eloquent
        // ****************
        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

// -------------------------
// Configurando a autenticação para o Admin

'guards' => [
    'web' => ['driver' => 'session','provider' => 'users',],
    'api' => ['driver' => 'token','provider' => 'users',],

    // Foi criado o "guard" para os admins. Alterando somente o provider para
    // a tabela correspondente, nesse caso é tabela admins
    'admin' => ['driver' => 'session','provider' => 'admins',],
    'admin-api' => ['driver' => 'token','provider' => 'admins',],
],

'providers' => [
    'users' => [
        'driver' => 'eloquent',
        'model' => App\User::class,
    ],
    // criado o provider para o model admins
    'admins' => [
        'driver' => 'eloquent',
        'model' => App\Admin::class,
    ],
    // 'users' => [
    //     'driver' => 'database',
    //     'table' => 'users',
    // ],
    ],


'passwords' => [
    'users' => [
        'provider' => 'users',
        // configuração informando a tabela responsável pela recuperação da senha
        'table' => 'password_resets',
        'expire' => 60,
    ],
    // configuração para o admin
    'admins' => [
        'provider' => 'admins',
        'table' => 'password_resets',
        'expire' => 60,
    ],
],
