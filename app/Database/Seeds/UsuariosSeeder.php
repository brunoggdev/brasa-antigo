<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'usuario' => 'usuario1',
                'email' => 'usuario1@exemplo.com.br',
                'senha' => password_hash('1234', PASSWORD_DEFAULT),
                'is_admin' => 1,
            ],
            [
                'usuario' => 'usuario2',
                'email' => 'usuario2@exemplo.com.br',
                'senha' => password_hash('1234', PASSWORD_DEFAULT),
                'is_admin' => 0,
            ]
        ];

        $this->db->table('usuarios')->insertBatch($data);
    }
}
