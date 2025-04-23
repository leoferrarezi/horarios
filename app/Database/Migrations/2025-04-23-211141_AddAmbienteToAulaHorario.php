<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAmbienteToAulaHorario extends Migration
{
    public function up()
    {
        $fields = [           
            'ambiente_id' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => TRUE
            ]
        ];

        $this->forge->addColumn('aula_horario', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('aula_horario', 'ambiente_id');
    }
}
