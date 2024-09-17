<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RestricoesProfessor extends Migration
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

            'professor_id' => [
                'type'          => 'INT',
                'constraint'    => 11,                
                'unsigned'      => TRUE
            ],

            'tempo_de_aula_id' => [
                'type'          => 'INT',
                'constraint'    => 11,                
                'unsigned'      => TRUE
            ],

            'tipo' => [
                'type'          => 'INT',
                'constraint'    => 1,                
                'unsigned'      => TRUE
            ]
        ]);

        $this->forge->addKey('id', true); //chave primária
        $this->forge->addForeignKey('professor_id', 'professores', 'id'); //chave estrangeira
        $this->forge->addForeignKey('tempo_de_aula_id', 'tempos_de_aula', 'id'); //chave estrangeira
        $this->forge->createTable('professor_restricoes');
    }

    public function down()
    {
        $this->forge->dropTable('professor_restricoes', true, true);
    }
}
