<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Horarios extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'horario_id' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => TRUE
            ],

            'nome' => [
                'type'          => 'VARCHAR',
                'constraint'    => 64,
                'unique'        => TRUE
            ]
        ]);

        $this->forge->addKey('horario_id', true); //chave primária
        $this->forge->createTable('horarios');
    }

    public function down()
    {
        $this->forge->dropTable('horarios', true, true);
    }
}
