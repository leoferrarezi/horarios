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
        $adminPassword = env('admin.defaultPassword', 'admin');

        // Inicializa o modelo de usuário
        $users = model(UserModel::class);

        // Verifica se o usuário admin já existe
        $existingUser = $users->where('username', 'admin')->first();

        if ($existingUser) {
            // Exclui o usuário admin se já existir
            $users->delete($existingUser->id, true);
        }

        // Cria uma nova entidade de usuário com os dados desejados
        $user = new User([
            'username' => 'admin',
            'email'    => 'admin@admin.com',
            'password' => $adminPassword,
        ]);

        // Salva o usuário no banco de dados
        $users->save($user);
    }
}
