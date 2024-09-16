<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Disciplinas extends Migration
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
            ],

            'codigo' => [
                'type'          => 'VARCHAR',
                'constraint'    => 8
            ],

            'matriz_id' => [
                'type'          => 'INT',
                'constraint'    => 11,
                'unsigned'      => TRUE
            ],

            'ch' => [
                'type'          => 'INT',
                'constraint'    => 4,
                'unsigned'      => TRUE
            ],

            'max_tempos_diarios' => [
                'type'          => 'INT',
                'constraint'    => 2,
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

            'grupo_de_ambientes_id' => [
                'type'          => 'INT',
                'constraint'    => 11,
                'unsigned'      => TRUE
            ]
        ]);

        $this->forge->addKey('id', true); //chave primária
        $this->forge->addForeignKey('matriz_id', 'matrizes', 'id'); //chave estrangeira
        $this->forge->addForeignKey('grupo_de_ambientes_id', 'grupos_de_ambientes', 'id'); //chave estrangeira
        $this->forge->createTable('disciplinas');
    }

    public function down()
    {
        $this->forge->dropTable('disciplinas', true, true);
    }
}
