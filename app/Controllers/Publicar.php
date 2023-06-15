<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PublicacionesModel;

class Publicar extends BaseController
{
    protected $helpers = ['url', 'form'];

    public function Principal($categoriaId = null)
{
    $publicacionesModel = new PublicacionesModel();

    if ($categoriaId !== null) {
        $publicaciones = $publicacionesModel->where('id_categorias', $categoriaId)->findAll();
    } else {
        $publicaciones = $publicacionesModel->findAll();
    }

    return view('inicio', ['publicaciones' => $publicaciones]);
}



    public function index()

    {
        // $publicacionesModel = new PublicacionesModel();
        // $publicaciones = $publicacionesModel->findAll(); // Obtiene todas las publicaciones

        // $data['publicaciones'] = $publicaciones;

        return view ('postear');

    }
    

    // public function indexPostCard()
    // {
    //     $publicacionesModel = new PublicacionesModel();

    //     $publicacion = $publicacionesModel->find(7);

    //     // Asigna cada campo a una variable separada
    //     $id_categorias = $publicacion['id_categorias'];
    //     $id_perfiles = $publicacion['id_perfiles'];
    //     $id_usuarios = $publicacion['id_usuarios'];
    //     $nombre_public = $publicacion['nombre_public'];
    //     $precio = $publicacion['precio'];
    //     $descripcion = $publicacion['descripcion'];
    //     $imagen_prod = $publicacion['imagen_prod'];
    //     $likes = $publicacion['likes'];
    //     $fecha_publicacion = $publicacion['fecha_publicacion'];

    //     // Carga la vista y pasa las variables
    //     echo view('post-card', [
    //         'id_categorias' => $id_categorias,
    //         'id_perfiles' => $id_perfiles,
    //         'id_usuarios' => $id_usuarios,
    //         'nombre_public' => $nombre_public,
    //         'precio' => $precio,
    //         'descripcion' => $descripcion,
    //         'imagen_prod' => $imagen_prod,
    //         'likes' => $likes,
    //         'fecha_publicacion' => $fecha_publicacion,
    //     ]);
    // }

    public function indexPost()
    {
        $publicacionesModel = new PublicacionesModel();

        $publicacion = $publicacionesModel->find(7);

        // Asigna cada campo a una variable separada
        $id_categorias = $publicacion['id_categorias'];
        $id_perfiles = $publicacion['id_perfiles'];
        $id_usuarios = $publicacion['id_usuarios'];
        $nombre_public = $publicacion['nombre_public'];
        $precio = $publicacion['precio'];
        $descripcion = $publicacion['descripcion'];
        $imagen_prod = $publicacion['imagen_prod'];
        $likes = $publicacion['likes'];
        $fecha_publicacion = $publicacion['fecha_publicacion'];

        // Carga la vista y pasa las variables
        echo view('post', [
            'id_categorias' => $id_categorias,
            'id_perfiles' => $id_perfiles,
            'id_usuarios' => $id_usuarios,
            'nombre_public' => $nombre_public,
            'precio' => $precio,
            'descripcion' => $descripcion,
            'imagen_prod' => $imagen_prod,
            'likes' => $likes,
            'fecha_publicacion' => $fecha_publicacion,
        ]);
    }

    // public function indexInicio()
    // {
    //     $publicacionesModel = new PublicacionesModel();

    //     $publicacion = $publicacionesModel->find(7);

    //     // Asigna cada campo a una variable separada
    //     $id_categorias = $publicacion['id_categorias'];
    //     $id_perfiles = $publicacion['id_perfiles'];
    //     $id_usuarios = $publicacion['id_usuarios'];
    //     $nombre = $publicacion['nombre'];
    //     $precio = $publicacion['precio'];
    //     $descripcion = $publicacion['descripcion'];
    //     $imagen_prod = $publicacion['imagen_prod'];
    //     $likes = $publicacion['likes'];
    //     $fecha_publicacion = $publicacion['fecha_publicacion'];

    //     // Carga la vista y pasa las variables
    //     return view('inicio', [
    //         'id_categorias' => $id_categorias,
    //         'id_perfiles' => $id_perfiles,
    //         'id_usuarios' => $id_usuarios,
    //         'nombre' => $nombre,
    //         'precio' => $precio,
    //         'descripcion' => $descripcion,
    //         'imagen_prod' => $imagen_prod,
    //         'likes' => $likes,
    //         'fecha_publicacion' => $fecha_publicacion,
    //     ]);
    // }





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
                'nombre_public' => $nombreProducto,
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
