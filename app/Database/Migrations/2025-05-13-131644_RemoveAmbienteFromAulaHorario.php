<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RemoveAmbienteFromAulaHorario extends Migration
{
    public function up()
    {
        $this->forge->dropColumn('aula_horario', 'ambiente_id');
    }

    public function down()
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
}
