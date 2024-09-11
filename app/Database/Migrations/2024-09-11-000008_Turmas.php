<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Turmas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'turma_id' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => TRUE
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

            'curso' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => TRUE
            ],

            'tempos_diarios' => [
                'type'              => 'INT',
                'constraint'        => 2,
                'unsigned'          => TRUE
            ],

            'tabela_de_horarios' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => TRUE
            ],

            'tabela_de_horarios_preferenciais' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => TRUE,
                'null'              => TRUE
            ]
        ]);

        $this->forge->addKey('turma_id', true); //chave primária
        $this->forge->addForeignKey('curso', 'cursos', 'curso_id'); //chave estrangeira
        $this->forge->addForeignKey('tabela_de_horarios', 'horarios', 'horario_id'); //chave estrangeira
        $this->forge->addForeignKey('tabela_de_horarios_preferenciais', 'horarios', 'horario_id'); //chave estrangeira
        $this->forge->createTable('turmas');
    }

    public function down()
    {
        $this->forge->dropTable('turmas', true, true);
    }
}
