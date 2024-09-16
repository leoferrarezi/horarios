<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Turmas extends Migration
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

            'codigo' => [
                'type'          => 'VARCHAR',
                'constraint'    => 32,
                'unique'        => TRUE
            ],

            'sigla' => [
                'type'          => 'VARCHAR',
                'constraint'    => 32,
                'unique'        => TRUE
            ],

            'ano' => [
                'type'              => 'INT',
                'constraint'        => 4,
                'unsigned'          => TRUE
            ],

            'semestre' => [
                'type'              => 'INT',
                'constraint'        => 1,
                'unsigned'          => TRUE
            ],

            'curso_id' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => TRUE
            ],

            'tempos_diarios' => [
                'type'              => 'INT',
                'constraint'        => 2,
                'unsigned'          => TRUE
            ],

            'horario_id' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => TRUE
            ],

            'horario_preferencial_id' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => TRUE,
                'null'              => TRUE
            ]
        ]);

        $this->forge->addKey('id', true); //chave primária
        $this->forge->addForeignKey('curso_id', 'cursos', 'id'); //chave estrangeira
        $this->forge->addForeignKey('horario_id', 'horarios', 'id'); //chave estrangeira
        $this->forge->addForeignKey('horario_preferencial_id', 'horarios', 'id'); //chave estrangeira
        $this->forge->createTable('turmas');
    }

    public function down()
    {
        $this->forge->dropTable('turmas', true, true);
    }
}
