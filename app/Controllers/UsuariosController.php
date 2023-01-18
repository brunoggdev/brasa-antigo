<?php

namespace App\Controllers;

use App\Models\UsuariosModel;

class UsuariosController extends BaseController
{

    /**
    * Renderiza a pagina de login caso o usuaário já não esteja logado
    * @author Brunoggdev
    */
    public function index()
    {
        if(! empty( session()->get('usuario') )){
            return redirect('restrito');
        }
        return renderizaPagina('login');
    }


    /**
     * Tenta fazer login do usuario
     * @author Brunoggdev
     */
    public function login()
    {

        $usuario = $this->request->getPost('usuario');
        $senha = $this->request->getPost('senha');

        $usuarioAutenticado = (new UsuariosModel())->autenticar($usuario, $senha);

        if (! $usuarioAutenticado) {
            session()->set(['loginMsg' => 'Usuario e/ou senha inválidos.']);

            return redirect('login');
        }
        
        session()->set(['usuario' => $usuarioAutenticado]);
        
        return redirect('restrito');
    }


    /**
    * Destroi a sessão e redireciona para pagina de login
    * @author Brunoggdev
    */
    public function logout()
    {
        session()->remove('usuario');
        session()->set(['loginMsg' => 'Logout efetuado.', 'alertColor' => 'success']);
        return redirect('login');
    }

}
