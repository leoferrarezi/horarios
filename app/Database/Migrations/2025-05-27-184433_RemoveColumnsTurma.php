<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RemoveColumnsTurma extends Migration
{
    public function up()
    {
        $this->forge->dropColumn('turmas', 'codigo');
        $this->forge->dropColumn('turmas', 'ano');
    }

    public function down()
    {
        //
    }
}
