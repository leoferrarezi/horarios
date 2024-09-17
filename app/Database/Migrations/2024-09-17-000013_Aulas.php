<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Aulas extends Migration
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

            'disciplina_id' => [
                'type'          => 'INT',
                'constraint'    => 11,                
                'unsigned'      => TRUE
            ],

            'turma_id' => [
                'type'          => 'INT',
                'constraint'    => 11,                
                'unsigned'      => TRUE
            ],

            'versao_id' => [
                'type'          => 'INT',
                'constraint'    => 11,                
                'unsigned'      => TRUE
            ]
        ]);

        $this->forge->addKey('id', true); //chave primária
        $this->forge->addForeignKey('disciplina_id', 'disciplinas', 'id'); //chave estrangeira
        $this->forge->addForeignKey('turma_id', 'turmas', 'id'); //chave estrangeira
        $this->forge->addForeignKey('versao_id', 'versoes', 'id'); //chave estrangeira
        $this->forge->createTable('aulas');
    }

    public function down()
    {
        $this->forge->dropTable('aulas', true, true);
    }
}
