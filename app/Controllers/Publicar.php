<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PublicacionesModel;

class Publicar extends BaseController
{
    protected $helpers = ['url', 'form'];

    public function indexpostcard()
    {
        $publicacionesModel = new PublicacionesModel();
        $publicaciones = $publicacionesModel->findAll(); // Obtiene todas las publicaciones

        $data['publicaciones'] = $publicaciones;

        return view('post-card', $data);

    }


    public function publish()
    {
        $validation = $this->validate([
            'nombre-producto' => [
                'rules'  => 'required|min_length[8]|max_length[25]',
                'errors' => [
                    'required' => 'Se necesita el nombre del producto.',
                    'min_length' => 'El nombre del producto debe tener al menos 8 caracteres.',
                    'max_length' => 'El nombre del producto no debe tener más de 25 caracteres.',
                ],
            ],
            'precio-producto' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Se necesita el precio del producto.',
                ],
            ],
            'descripcion-producto' => [
                'rules'  => 'required|min_length[8]|max_length[75]',
                'errors' => [
                    'required' => 'Se necesita la descripción del producto.',
                    'min_length' => 'La descripción del producto debe tener al menos 8 caracteres.',
                    'max_length' => 'La descripción del producto no debe tener más de 75 caracteres.',
                ],
            ],
                        
        ]);

        if (!$validation) {
            return redirect()->to(base_url('postear'))->with('errors', $this->validator->getErrors())->withInput();
        } else {
            // Registro en la base de datos
            $nombreProducto = $this->request->getPost('nombre-producto');
            $precioProducto = $this->request->getPost('precio-producto');
            $descripcionProducto = $this->request->getPost('descripcion-producto');
            $categoriaId = $this->request->getPost('categoriaId');
            $imagenes = $this->request->getFiles('images');
            $usuario_id = session('usuario')['id_usuarios'];
            // $imagenNombres = [];

            // if (is_array($imagenes) && count($imagenes) > 0) {
            //     foreach ($imagenes as $imagen) {
            //         if ($imagen->isValid() && !$imagen->hasMoved()) {
            //             // Generar un nombre único para la imagen
            //             $nombreImagen = $imagen->getRandomName();

            //             // Mover la imagen a la ubicación deseada
            //             $imagen->move(ROOTPATH . 'public/uploads', $nombreImagen);

            //             // Guardar el nombre de la imagen en un array
            //             $imagenNombres[] = $nombreImagen;
            //         }
            //     }
            // }


            $data = [
                'nombre' => $nombreProducto,
                'precio' => $precioProducto,
                'descripcion' => $descripcionProducto,
                'id_categorias' => $categoriaId,
                // 'imagen_prod' => implode(',', $imagenNombres), // Guardar los nombres de las imágenes separados por comas
                'id_perfiles' => $usuario_id,
                'id_usuarios' => $usuario_id,
                'likes' => 0,
            ];

            $publicacionesModel = new PublicacionesModel();
            $query = $publicacionesModel->insert($data);

            // if ($query) {
            //     // El registro se insertó correctamente
            //     // Realiza cualquier acción adicional necesaria
            // } else {
            //     // Ocurrió un error al insertar el registro
            //     // Realiza cualquier acción adicional necesaria
            // }

            // // Redireccionar a la vista "inicio"
            return redirect()->to(base_url('inicio'));
        }
    }
}
