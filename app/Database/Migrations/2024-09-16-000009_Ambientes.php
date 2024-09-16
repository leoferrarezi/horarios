<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Ambientes extends Migration
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
                'constraint'    => 128
            ]
        ]);

        $this->forge->addKey('id', true); //chave primária        
        $this->forge->createTable('ambientes');
    }

    public function down()
    {
        $this->forge->dropTable('ambientes', true, true);
    }
}
