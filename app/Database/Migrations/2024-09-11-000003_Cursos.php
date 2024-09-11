<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Cursos extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'curso_id' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => TRUE,
                'auto_increment'    => TRUE
            ],

            'nome' => [
                'type'          => 'VARCHAR',
                'constraint'    => 128,
                'unique'        => TRUE
            ],

            'matriz' => [
                'type'          => 'INT',
                'constraint'    => 11,
                'unsigned'      => TRUE
            ]
        ]);

        $this->forge->addKey('curso_id', true); //chave primária
        $this->forge->addForeignKey('matriz', 'matrizes', 'matriz_id'); //chave estrangeira
        $this->forge->createTable('cursos');
    }

    public function down()
    {
        $this->forge->dropTable('cursos', true, true);
    }
}
