<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AdicionarTabelaLogs extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'usuario'       => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => false], // Exemplo: "ID: 1 NOME: admin"
            'acao'          => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => false],
            'detalhes'      => ['type' => 'TEXT', 'null' => true],
            'tabela_afetada'=> ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true], // Nome da tabela afetada
            'registro_id'   => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true], // ID do registro afetado
            'created_at'    => ['type' => 'DATETIME', 'null' => true],
            'updated_at'    => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('logs');
    }

    public function down()
    {
        $this->forge->dropTable('logs');
    }
}
