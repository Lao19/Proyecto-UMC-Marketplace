<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AvatarModel;

class Avatares extends BaseController
{
    protected $helpers = ['url'];
    public function guardarActualizarAvatar()
    {
        $usuarioId = session('usuario')['id_usuarios'];// Obtener el ID de usuario desde la sesión

        $avatarId = $this->request->getPost('avatarId');
        $avatarSrc = $this->request->getPost('avatarSrc');

        if (!isset($usuarioId, $avatarId, $avatarSrc)) {
            return $this->response->setStatusCode(400)->setJSON(['status' => 'error', 'message' => 'Datos faltantes.']);
        }

        $AvatarModel = new AvatarModel();

        // Verificar si el usuario ya tiene un avatar registrado
        $avatar = $AvatarModel->where('id_perfiles', $usuarioId)->first();
        if ($avatar) {
            // Actualizar el avatar existente
            $AvatarModel->update($avatar['id'], [
                'id_avatares' => $avatarId,
                'avatar_url' => $avatarSrc
            ]);
        } else {
            // Insertar un nuevo avatar
            $AvatarModel->insert([
                'id_perfiles' => $usuarioId,
                'id_avatares' => $avatarId,
                'avatar_url' => $avatarSrc
            ]);
        }
        print($avatarId);
        print($avatarSrc);
        return $this->response->setJSON(['status' => 'success', 'message' => 'Avatar guardado exitosamente.']);
    }
}
