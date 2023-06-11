<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;
use App\Models\AvatarModel;

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

        // Pasar las variables a la vista, incluyendo $avatarSrc
        // Obtener la URL del avatar del usuario
        $avatarModel = new AvatarModel();
        $avatar = $avatarModel->where('id_perfiles', $usuarioId)->first();
        $avatarSrc = $avatar ? $avatar['avatar_url'] : 'ruta_predeterminada_del_avatar';
        return view('profile', compact('usuarioId', 'usuario', 'nombre', 'apellido', 'telefono', 'biografia', 'avatarSrc'));
    }

    public function public($usuario)
    {
        // Obtener la información del usuario correspondiente de la base de datos
        $UsuarioModel = new UsuarioModel();
        $usuario = $UsuarioModel->where('usuario', $usuario)->first();

        // Obtener la URL del avatar del usuario
        $usuarioId = $usuario['id_usuarios'];
        $avatarModel = new AvatarModel();
        $avatar = $avatarModel->where('id_perfiles', $usuarioId)->first();
        $avatarSrc = $avatar ? $avatar['avatar_url'] : 'ruta_predeterminada_del_avatar';

        // Cargar la vista de perfil público y pasar la información del usuario y el avatarSrc
        return view('profile-user', compact('usuario', 'avatarSrc'));
    }

    public function guardarActualizarAvatar()
    {
        $usuarioId = session('usuario')['id_usuarios']; // Obtener el ID de usuario desde la sesión

        $avatarId = $this->request->getPost('avatarId');
        $avatarSrc = $this->request->getPost('avatarSrc');

        if (!$usuarioId || !$avatarId || !$avatarSrc) {
            return $this->response->setStatusCode(400)->setJSON(['status' => 'error', 'message' => 'Datos faltantes.']);
        }

        $avatarModel = new AvatarModel();

        // Verificar si el usuario ya tiene un avatar registrado
        $avatar = $avatarModel->where('id_perfiles', $usuarioId)->first();
        if ($avatar) {
            // Actualizar el avatar existente
            $avatarModel->update($avatar['id_avatares'], [
                'id_avatares' => $avatarId,
                'avatar_url' => $avatarSrc
            ]);
        } else {
            // Insertar un nuevo avatar
            $avatarModel->insert([
                'id_perfiles' => $usuarioId,
                'id_avatares' => $avatarId,
                'avatar_url' => $avatarSrc
            ]);
        }

        return $this->response->setJSON(['status' => 'success', 'message' => 'Avatar guardado exitosamente.']);
    }

}
