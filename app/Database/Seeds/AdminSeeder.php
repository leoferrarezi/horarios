<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;
use CodeIgniter\Config\Services;
use CodeIgniter\Shield\Entities\User;
use CodeIgniter\Shield\Models\UserModel;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Obtém a senha do admin do arquivo .env
        $adminPassword = env('admin.defaultPassword', 'admin');

        // Inicializa o modelo de usuário e cria a entidade do usuário
        $users = model(UserModel::class);

        // Crie uma nova entidade de usuário com os dados desejados
        $user = new User([
            'username' => 'admin',
            'email'    => 'admin@admin.com',
            'password' => $adminPassword,
        ]);

        // Salve o usuário e crie a identidade de autenticação
        $users->save($user);
    }
}
