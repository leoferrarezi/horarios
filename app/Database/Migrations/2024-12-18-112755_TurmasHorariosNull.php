<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TurmasHorariosNull extends Migration
{
    public function up()
    {
        $this->forge->dropForeignKey('turmas', 'turmas_horario_id_foreign'); //remove chave estrangeira
        $this->forge->dropKey('turmas', 'turmas_horario_id_foreign', false); //remove indice

        $this->forge->dropForeignKey('turmas', 'turmas_horario_preferencial_id_foreign'); //remove chave estrangeira
        $this->forge->dropKey('turmas', 'turmas_horario_preferencial_id_foreign', false); //remove indice        
        
        $this->forge->processIndexes('turmas');

        $fields = [
            'horario_id' => [
                'name' => 'horario_id',
                'type' => 'int',                
                'null' => true,
            ],
            'horario_preferencial_id' => [
                'name' => 'horario_preferencial_id',
                'type' => 'int',                
                'null' => true,
            ],
        ];

        $this->forge->modifyColumn('turmas', $fields);
    }

    public function down()
    {
        $fields = [
            'horario_id' => [
                'name' => 'horario_id',
                'null' => false,
                'type'          => 'INT',
                'constraint'    => 11,
                'unsigned'      => TRUE
            ],
            'horario_preferencial_id' => [
                'name' => 'horario_preferencial_id',
                'null' => false,
                'type'          => 'INT',
                'constraint'    => 11,
                'unsigned'      => TRUE
            ],
        ];
        $this->forge->modifyColumn('turmas', $fields);
        $this->forge->addForeignKey('horario_id', 'horarios', 'id'); //add chave estrangeira
        $this->forge->addForeignKey('horario_preferencial_id', 'horarios', 'id'); //add chave estrangeira
        $this->forge->processIndexes('turmas');
    }
}
