<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPeriodoInTurmas extends Migration
{
    public function up()
    {
        $fields = [           
            'periodo' => [
                'type'              => 'INT',
                'constraint'        => 2,
                'unsigned'          => TRUE
            ]
        ];

        $this->forge->addColumn('turmas', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('turmas', 'periodo');
    }
}