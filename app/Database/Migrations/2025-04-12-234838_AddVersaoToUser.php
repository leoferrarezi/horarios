<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddVersaoToUser extends Migration
{
    public function up()
    {
        $fields = [           
            'versao_em_uso' => [
                'type'              => 'INT',
                'constraint'        => 6,
                'unsigned'          => TRUE
            ]
        ];

        $this->forge->addColumn('users', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'versao_em_uso');
    }
}
