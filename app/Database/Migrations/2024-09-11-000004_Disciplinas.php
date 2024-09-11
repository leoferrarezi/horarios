<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Disciplinas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'disciplina_id' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => TRUE,
                'auto_increment'    => TRUE
            ],

            'nome' => [
                'type'          => 'VARCHAR',
                'constraint'    => 128
            ],

            'codigo' => [
                'type'          => 'VARCHAR',
                'constraint'    => 8
            ],

            'matriz' => [
                'type'          => 'INT',
                'constraint'    => 11,
                'unsigned'      => TRUE
            ],

            'ch' => [
                'type'          => 'INT',
                'constraint'    => 4,
                'unsigned'      => TRUE
            ],

            'periodo' => [
                'type'          => 'INT',
                'constraint'    => 2,
                'unsigned'      => TRUE
            ],
            
            'abreviatura' => [
                'type'          => 'VARCHAR',
                'constraint'    => 32,
            ],
        ]);

        $this->forge->addKey('disciplina_id', true); //chave primária
        $this->forge->addForeignKey('matriz', 'matrizes', 'matriz_id'); //chave estrangeira
        $this->forge->createTable('disciplinas');
    }

    public function down()
    {
        $this->forge->dropTable('disciplinas', true, true);
    }
}
