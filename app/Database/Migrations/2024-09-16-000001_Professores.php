<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Professores extends Migration
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
                'constraint'    => 96,
                'unique'        => TRUE
            ],

            'siape' => [
                'type'          => 'INT',
                'constraint'    => 7,
                'unsigned'      => TRUE,
                'null'          => TRUE,
                'unique'        => TRUE
            ],

            'email' => [
                'type'          => 'VARCHAR',
                'constraint'    => 128,
                'null'          => TRUE
            ]
        ]);

        $this->forge->addKey('id', true); //chave primária
        $this->forge->createTable('professores');
    }

    public function down()
    {
        $this->forge->dropTable('professores', true, true);
    }
}
