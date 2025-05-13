<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AulaHorarioAmbiente extends Migration
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

            'aula_horario_id' => [
                'type'          => 'INT',
                'constraint'    => 11,                
                'unsigned'      => TRUE
            ],

            'ambiente_id' => [
                'type'          => 'INT',
                'constraint'    => 11,                
                'unsigned'      => TRUE
            ]
        ]);

        $this->forge->addKey('id', true); //chave primária
        $this->forge->addForeignKey('aula_horario_id', 'aula_horario', 'id'); //chave estrangeira
        $this->forge->addForeignKey('ambiente_id', 'ambientes', 'id'); //chave estrangeira        
        $this->forge->createTable('aula_horario_ambiente'); //cria a tabela
    }

    public function down()
    {
        $this->forge->dropTable('aula_horario_ambiente', true, true);
    }
}
