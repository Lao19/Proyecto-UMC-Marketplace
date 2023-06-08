<?php

namespace App\Models;

use CodeIgniter\Model;

class AvatarModel extends Model
{
    protected $table = 'avatares';
    protected $primaryKey = 'id_avatares';
    protected $allowedFields = ['id_avatares', 'id_perfiles', 'avatar_url'];

    // public function obtenerAvatarPorUsuario($usuarioId)
    // {
    //     return $this->db->table('avatares')
    //         ->select('avatar_url')
    //         ->join('perfiles', 'perfiles.id_avatares = avatares.id_avatares')
    //         ->where('perfiles.id_usuarios', $usuarioId)
    //         ->get()
    //         ->getRow();
    // }

    // public function guardarAvatar($usuarioId, $imagen)
    // {
    //     $this->db->transStart();

    //     // Insertar el registro del avatar
    //     $this->insert(['avatar_url' => $imagen]);
    //     $avatarId = $this->insertID();

    //     // Actualizar el campo id_avatares en la tabla perfiles
    //     $this->db->table('perfiles')
    //         ->where('id_usuarios', $usuarioId)
    //         ->update(['id_avatares' => $avatarId]);

    //     $this->db->transComplete();

    //     return $this->db->transStatus();
    // }

    // public function actualizarAvatar($usuarioId, $imagen)
    // {
    //     $avatar = $this->obtenerAvatarPorUsuario($usuarioId);

    //     if ($avatar) {
    //         $avatarId = $avatar->id_avatares;

    //         $this->db->table('avatares')
    //             ->where('id_avatares', $avatarId)
    //             ->update(['avatar_url' => $imagen]);

    //         return true;
    //     }

    //     return false;
    // }
}
