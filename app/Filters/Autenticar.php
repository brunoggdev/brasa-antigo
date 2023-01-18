<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Autenticar implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(empty( session()->get('usuario') )){

            session()->set([
                'loginMsg' => 'Por favor, realize login para acessar essa página.',
                'requestedUri' => $request->uri
            ]);

            return redirect('login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}