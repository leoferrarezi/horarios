<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SeedAdminUser extends Migration
{
    public function up()
    {
        // Executa o seeder para criar o usuário admin
        $seeder = \Config\Database::seeder();
        $seeder->call('App\Database\Seeds\AdminSeeder');
    }

    public function down()
    {
        // Opcional: Remova o usuário admin caso a migration seja revertida
        $db = \Config\Database::connect();
        $db->table('users')->where('secret', 'admin@admin.com')->delete();
    }
}
