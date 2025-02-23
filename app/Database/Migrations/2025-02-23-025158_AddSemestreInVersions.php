<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddSemestreInVersions extends Migration
{
    public function up()
    {
        $fields = [           
            'semestre' => [
                'type'              => 'INT',
                'constraint'        => 1,
                'unsigned'          => TRUE
            ]
        ];

        $this->forge->addColumn('versoes', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('versoes', 'semestre');
    }
}
