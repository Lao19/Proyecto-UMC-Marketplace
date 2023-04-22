<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AlreadyLoggedInFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if ( session()->get('LoggedUser')){
            return  redirect()->back();
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}

// namespace App\Filters;

// use CodeIgniter\HTTP\RequestInterface;
// use CodeIgniter\HTTP\ResponseInterface;
// use CodeIgniter\Filters\FilterInterface;

// class AlreadyLoggedInFilter implements FilterInterface
// {
//     public function before(RequestInterface $request, $arguments = null)
//     {
//         // Verificar si el usuario ha iniciado sesión
//         if (! session()->has('usuario')) {
//             return redirect()->to(base_url('/'))->with('Error', 'Debe iniciar sesión para acceder a esta página.');
//         }
//     }

//     public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
//     {
//         // No se necesita realizar ninguna acción después de la solicitud
//     }
// }




// namespace App\Filters;

// use CodeIgniter\Filters\FilterInterface;
// use CodeIgniter\HTTP\RequestInterface;
// use CodeIgniter\HTTP\ResponseInterface;

// class AlreadyLoggedInFilter implements FilterInterface
// {
//     public function before(RequestInterface $request, $arguments = null)
//     {
//         if ( !session()-> get('$usuario')){//get('login')){
//             return  redirect()->to(base_url('/'));
//         }
//      //   if (! session()->get('usuario')) {
//         //     return redirect()->to(base_url('/'))->with('Error', 'Debes iniciar sesión primero');
//         // }
//     }

//     public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
//     {
//         // Do something here
//     }
// }