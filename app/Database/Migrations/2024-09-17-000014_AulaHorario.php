<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AulaHorario extends Migration
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

            'aula_id' => [
                'type'          => 'INT',
                'constraint'    => 11,                
                'unsigned'      => TRUE
            ],

            'tempo_de_aula_id' => [
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
        $this->forge->addForeignKey('aula_id', 'aulas', 'id'); //chave estrangeira
        $this->forge->addForeignKey('tempo_de_aula_id', 'tempos_de_aula', 'id'); //chave estrangeira
        $this->forge->createTable('aula_horario');
    }

    public function down()
    {
        $this->forge->dropTable('aula_horario', true, true);
    }
}
