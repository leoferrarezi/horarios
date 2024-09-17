<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AulaProfessor extends Migration
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

            'aula_id' => [
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
        $this->forge->addForeignKey('professor_id', 'professores', 'id'); //chave estrangeira
        $this->forge->addForeignKey('aula_id', 'aulas', 'id'); //chave estrangeira        
        $this->forge->createTable('aula_professor');
    }

    public function down()
    {
        $this->forge->dropTable('aula_professor', true, true);
    }
}
