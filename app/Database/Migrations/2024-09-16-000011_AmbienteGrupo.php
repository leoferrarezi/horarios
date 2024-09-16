<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AmbienteGrupo extends Migration
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

            'ambiente_id' => [
                'type'          => 'INT',
                'constraint'    => 11
            ],

            'grupo_de_ambiente_id' => [
                'type'          => 'INT',
                'constraint'    => 11
            ]
        ]);

        $this->forge->addKey('id', true); //chave primária
        $this->forge->addForeignKey('ambiente_id', 'ambientes', 'id'); //chave estrangeira
        $this->forge->addForeignKey('grupo_de_ambiente_id', 'grupos_de_ambientes', 'id'); //chave estrangeira
        $this->forge->createTable('ambiente_grupo');
    }

    public function down()
    {
        $this->forge->dropTable('ambiente_grupo', true, true);
    }
}
