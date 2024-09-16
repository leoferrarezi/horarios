<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class GruposAmbientes extends Migration
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
        $this->forge->createTable('grupos_de_ambientes');
    }

    public function down()
    {
        $this->forge->dropTable('grupos_de_ambientes', true, true);
    }
}
