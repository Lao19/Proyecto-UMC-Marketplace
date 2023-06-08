<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AvatarModel;

class Avatares extends BaseController
{
    protected $helpers = ['url', 'form'];

    // public function Vista_Perfil2()
    // {
    //     return view('profile');
    // }

    public function guardarActualizarAvatar()
    {
        $usuarioId = session('usuario')['id_usuarios'];// Obtener el ID de usuario desde la sesión

        $avatarId = $this->request->getPost('avatarId');
        $avatarSrc = $this->request->getPost('avatarSrc');

        if (!isset($usuarioId, $avatarId, $avatarSrc)) {
            return $this->response->setStatusCode(400);
        }

        $AvatarModel = new AvatarModel();

        // Verificar si el usuario ya tiene un avatar registrado
        $avatar = $AvatarModel->where('id_perfiles', $usuarioId)->first();
        if ($avatar) {
            // Actualizar el avatar existente
            $AvatarModel->update($avatar['id'], array(
                'id_avatares' => $avatarId,
                'avatar_url' => $avatarSrc
            ));
            
            // Redirigir al usuario a la vista original
            // return redirect()->to(base_url('profile'));

        } else {
            // Insertar un nuevo avatar
            $AvatarModel->insert(array(
                'id_perfiles' => $usuarioId,
                'id_avatares' => $avatarId,
                'avatar_url' => $avatarSrc
            ));

            // // Redirigir al usuario a la vista original
            // return redirect()->to(base_url('profile'));
        }
    }
}
