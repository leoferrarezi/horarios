<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TemposDeAula extends Migration
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

            'horario_id' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => TRUE
            ],

            'dia_semana' => [
                'type'              => 'INT',
                'constraint'        => 1,       //valores de 0 a 6
                'unsigned'          => TRUE
            ],

            'hora_inicio' => [
                'type'          => 'INT',
                'constraint'    => 2,       //valores de 0 a 23
                'unsigned'      => TRUE
            ],

            'minuto_inicio' => [
                'type'          => 'INT',
                'constraint'    => 2,       //valores de 0 a 59
                'unsigned'      => TRUE
            ],

            'hora_fim' => [
                'type'          => 'INT',
                'constraint'    => 2,       //valores de 0 a 23
                'unsigned'      => TRUE
            ],

            'minuto_fim' => [
                'type'          => 'INT',
                'constraint'    => 2,       //valores de 0 a 59
                'unsigned'      => TRUE
            ]
        ]);

        $this->forge->addKey('id', true); //chave primária
        $this->forge->addForeignKey('horario_id', 'horarios', 'id'); //chave estrangeira
        $this->forge->createTable('tempos_de_aula');
    }

    public function down()
    {
        $this->forge->dropTable('tempos_de_aula', true, true);
    }
}
