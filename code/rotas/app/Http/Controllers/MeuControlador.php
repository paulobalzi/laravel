<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeuControlador extends Controller
{
    public function getNome()
    {
        return "Paulo Balzi";
    }

    public function getIdade()
    {
        return '20 anos';
    }

    public function multiplicar($n1, $n2)
    {
        return ($n1 * $n2);
    }

    public function getNomeById($id)
    {
        $v = ['Paulo', 'Balzi', 'Paty', 'Paola'];
        return $v[$id];
    }
}
