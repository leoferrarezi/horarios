<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddRegimeParaCurso extends Migration
{
    public function up()
    {
        $fields = [
            'regime' => [
                'type'              => 'INT',
                'constraint'        => 1,
                'unsigned'          => TRUE
            ]
        ];

        $this->forge->addColumn('cursos', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('cursos', 'regime');
    }
}
