<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model
{
    //Atributos de configuração
    protected $table = 'usuarios';
    protected $primaryKey = 'id';


    /**
     * Tenta autenticar o usuario e senha no banco de dados
     * @author Brunoggdev
     * @return array|false
     */
    public function autenticar(string $usuario, string $senha)
    {

        $usuario = $this->asArray()->where(['usuario' => $usuario])->first();

        if (empty($usuario)) {
            return false;
        }

        if (!password_verify($senha, $usuario['senha'])) {
            return false;
        }

        // removendo a senha do array antes de devolver pro controller
        unset($usuario['senha']);

        return $usuario;
    }
}