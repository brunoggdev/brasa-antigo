<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class UsuarioLogado implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(! usuarioLogado() ){

            return redirect('login')->with('mensagem', [
                'texto' => 'Voce deve realizar o login para acessar essa página.',
                'cor' => 'danger'
            ]);
            
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
