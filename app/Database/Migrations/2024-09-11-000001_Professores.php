<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Professores extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'professor_id' => [
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
            ]
        ]);

        $this->forge->addKey('professor_id', true); //chave primária
        $this->forge->createTable('professores');
    }

    public function down()
    {
        $this->forge->dropTable('professores', true, true);
    }
}
