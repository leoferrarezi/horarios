<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TemposDeAula extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'tempo_id' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => TRUE
            ],

            'time_inicio' => [
                'type'          => 'VARCHAR',
                'constraint'    => 5
            ],

            'time_fim' => [
                'type'          => 'VARCHAR',
                'constraint'    => 5
            ]
        ]);

        $this->forge->addKey('tempo_id', true); //chave primária
        $this->forge->createTable('tempos_de_aula');
    }

    public function down()
    {
        $this->forge->dropTable('tempos_de_aula', true, true);
    }
}
