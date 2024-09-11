<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Matrizes extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'matriz_id' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => TRUE
            ],

            'nome' => [
                'type'          => 'VARCHAR',
                'constraint'    => 128,
                'unique'        => TRUE
            ]
        ]);

        $this->forge->addKey('matriz_id', true); //chave primária
        $this->forge->createTable('matrizes');
    }

    public function down()
    {
        $this->forge->dropTable('matrizes', true, true);
    }
}
