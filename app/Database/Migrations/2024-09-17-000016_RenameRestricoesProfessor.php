<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RenameRestricoesProfessor extends Migration
{
    public function up()
    {
        $this->forge->renameTable('professor_restricoes', 'professor_regras');
    }

    public function down()
    {
        $this->forge->renameTable('professor_regras', 'professor_restricoes');
    }
}
