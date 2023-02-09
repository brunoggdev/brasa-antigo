<?php

namespace App\Controllers;

use App\Models\UsuariosModel;

class UsuariosController extends BaseController
{

    /**
    * Aqui pode vir uma função para listar todos os usuarios
    * @author Brunoggdev
    */
    public function index()
    {
        // 
    }


    /**
     * Tenta fazer login do usuario
     * @author Brunoggdev
     */
    public function login()
    {

        $usuario = $this->request->getPost('usuario');
        $senha = $this->request->getPost('senha');

        $usuarioAutenticado = (new UsuariosModel)->autenticar($usuario, $senha);

        if (! $usuarioAutenticado) {

            return redirect('login')->with('mensagem', [
                'texto' => 'Usuario e/ou senha inválidos.',
                'cor' => 'danger'
            ]);
            
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

        return redirect('login')->with('mensagem', [
            'mensagem' => 'Logout efetuado com sucesso.',
            'cor' => 'success'
        ]);
    }

}
