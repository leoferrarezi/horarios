<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Horarios extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => TRUE,
                'auto_increment'    => TRUE
            ],

            'nome' => [
                'type'          => 'VARCHAR',
                'constraint'    => 64,
                'unique'        => TRUE
            ]
        ]);

        $this->forge->addKey('id', true); //chave primária
        $this->forge->createTable('horarios');
    }

    public function down()
    {
        $this->forge->dropTable('horarios', true, true);
    }
}
