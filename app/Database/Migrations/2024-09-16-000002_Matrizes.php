<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Matrizes extends Migration
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
                'constraint'    => 128,
                'unique'        => TRUE
            ]
        ]);

        $this->forge->addKey('id', true); //chave primária
        $this->forge->createTable('matrizes');
    }

    public function down()
    {
        $this->forge->dropTable('matrizes', true, true);
    }
}
