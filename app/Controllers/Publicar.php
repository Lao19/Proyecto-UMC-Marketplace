<?php

namespace App\Controllers;
use App\Controllers\BaseController;

class Publicar extends BaseController
{
    public function index()
    {
        return view('postear');
    }
}
