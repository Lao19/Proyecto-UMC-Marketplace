<?php

namespace App\Controllers;
use App\Models\UsuarioModel;

class publicaciones extends BaseController
{
    public function post()
    {
        return view('post');
    }
}