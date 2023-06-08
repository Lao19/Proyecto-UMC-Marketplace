<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;

class Perfil extends BaseController
{
    public function Vista_perfil()
    {
        return view('profile');
    }

    public function guardar_biografia()
    {
        $biografia = $this->request->getPost('biografia');
    
        // Obtener el ID del usuario desde la sesión
        $usuario_id = session('usuario')['id_usuarios'];
    
        // Actualizar la biografía en la base de datos
        $UsuarioModel = new UsuarioModel();
        $UsuarioModel->update($usuario_id, ['biografia' => $biografia]);
    
        // Actualizar la biografía en la sesión
        $usuario = session('usuario');
        $usuario['biografia'] = $biografia;
        session()->set('usuario', $usuario);
    
        // Devolver la biografía actualizada en formato JSON
        return $this->response->setJSON(['biografia' => $biografia]);
    }



    
    
    public function account()
    {
        // Obtener los datos del usuario a partir de la sesión
        $usuarioId = session('usuario')['id_usuarios'];
        $usuario = session('usuario')['usuario'];
        $nombre = session('usuario')['nombre'];
        $apellido = session('usuario')['apellido'];
        $telefono = session('usuario')['telefono'];
        $biografia = session('usuario')['biografia'];
    
        // Pasar las variables a la vista
        return view('profile', compact('usuarioId','usuario', 'nombre', 'apellido', 'telefono', 'biografia'));
    }

    public function public($usuario)
    {
        // Obtener la información del usuario correspondiente de la base de datos
        $UsuarioModel = new UsuarioModel();
        $usuario = $UsuarioModel->where('usuario', $usuario)->first();

        // Cargar la vista de perfil público y pasar la información del usuario
        return view('profile-user', ['usuario' => $usuario]);
    }
}
