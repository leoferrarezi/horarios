<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DisciplinasAmbienteNull extends Migration
{
    public function up()
    {
        $this->forge->dropForeignKey('disciplinas', 'disciplinas_grupo_de_ambientes_id_foreign'); //remove chave estrangeira
        $this->forge->dropKey('disciplinas', 'disciplinas_grupo_de_ambientes_id_foreign', false); //remove indice
        $this->forge->processIndexes('disciplinas');

        $fields = [
            'grupo_de_ambientes_id' => [
                'name' => 'grupo_de_ambientes_id',
                'type' => 'int',                
                'null' => true,
            ],
        ];
        $this->forge->modifyColumn('disciplinas', $fields);
    }

    public function down()
    {
        $fields = [
            'grupo_de_ambientes_id' => [
                'name' => 'grupo_de_ambientes_id',
                'null' => false,
                'type'          => 'INT',
                'constraint'    => 11,
                'unsigned'      => TRUE
            ],
        ];
        $this->forge->modifyColumn('disciplinas', $fields);
        $this->forge->addForeignKey('grupo_de_ambientes_id', 'grupos_de_ambientes', 'id'); //add chave estrangeira
        $this->forge->processIndexes('disciplinas');
    }
}
