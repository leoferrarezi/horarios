<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DropColumnVersionInAulaProfessores extends Migration
{
    public function up()
    {
        $this->forge->dropColumn('aula_professor', 'versao_id');
    }

    public function down()
    {
        $fields = [           
            'versao_id' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => TRUE
            ]
        ];

        $this->forge->addColumn('aula_professor', $fields);
    }
}
