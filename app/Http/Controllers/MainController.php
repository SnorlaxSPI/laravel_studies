<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        echo 'index';
    }

    public function about()
    {
        echo 'about';
    }

    public function mostrarValor($valor)
    {
        echo "O valor enviado pela rota: $valor";
    }

    public function mostrarPosts($user_id, $post_id)
    {
        echo "O usuário com ID: $user_id, está acessando o post de ID: $post_id";
    }
}
