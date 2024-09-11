<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class GradeDeHorarios extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'grade_id' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => TRUE
            ],

            'horario' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => TRUE
            ],

            'tempo' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => TRUE
            ],

            'ordem' => [
                'type'              => 'INT',
                'constraint'        => 2,
                'unsigned'          => TRUE
            ]
        ]);

        $this->forge->addKey('grade_id', true); //chave primária
        $this->forge->addForeignKey('horario', 'horarios', 'horario_id'); //chave estrangeira
        $this->forge->addForeignKey('tempo', 'tempos_de_aula', 'tempo_id'); //chave estrangeira
        $this->forge->createTable('grade_horario');
    }

    public function down()
    {
        $this->forge->dropTable('grade_horario');
    }
}
