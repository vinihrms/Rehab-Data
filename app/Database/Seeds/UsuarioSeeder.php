<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsuarioSeeder extends Seeder
{   
    
    public function run()
    {
        $usuarioModel = new \App\Models\UsuarioModel();

        $admin = [
            'id'              => 1,
            'nome'            => 'Admin',
            'email'           => 'admin@admin.com',
            'senha'           => '$2y$10$J9.NIxV5UGpGcond7IGeqOBDNdHklslCKaBPsEVNdRFFyWOq5UjtC',
            'ra'              => '000000',
            'ativo'           => 1,
            'admin'           => 1,
            'created_at'      => '2024-03-11 11:28:24',
            'updated_at'      => '2024-03-11 11:28:24',
            'deleted_at'      => NULL
        ];

        $usuarioModel->protect(false)->insert($admin);
        dd($usuarioModel->errors());
    }
}
