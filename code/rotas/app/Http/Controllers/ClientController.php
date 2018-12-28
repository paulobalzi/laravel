<?php
/**
 *  php artisan make:controller ClientController --resource
 *  comando para criar a controller
 *  option: --resource => cria as actions padrões
 *
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "Lista de todos os clientes";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "Formulario para cadastrar novo cliente";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $s = 'Armazenar';
        $s .= " Nome: " . $request->input('nome');
        $s .= " e Idade: " . $request->input('idade');
        return response($s, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $v = ['paulo', 'henrique', 'balzi', 'gonçalves'];
        return $v[$id];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return "Formulario para edição do usuário {$id}";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     * nesse caso foi necessário colocar um atributo "_method" no data
     * do formulario para indicar o método http que será executado
     * _method=PUT ou _method=PATCH
     * porque pela rota criada pelo resource, o laravel só entende esses dois métods
     * http para o update do registro
     *
     * Enviando pelo method PUT os dados do formulário não são enviados
     */
    public function update(Request $request, $id)
    {
        $s = "Atualizar o cliente {$id}";
        $s .= " Nome: " . $request->input('nome');
        $s .= " e Idade: " . $request->input('idade');
        return response($s, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     * http method = delete
     */
    public function destroy($id)
    {
        return response("Cliente apagado id = {$id}", 200);
    }
}
