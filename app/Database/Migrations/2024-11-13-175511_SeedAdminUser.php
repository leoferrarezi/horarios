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
        $db = \Config\Database::connect();
        $db->table('auth_identities')->where('secret', 'admin@admin.com')->delete();
        $db->table('users')->where('username', 'admin')->delete();
    }
}
