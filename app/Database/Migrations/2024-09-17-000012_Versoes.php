<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Versoes extends Migration
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

            'nome' => [
                'type'          => 'VARCHAR',
                'constraint'    => 96,
                'unique'        => TRUE
            ],

            'created_at' => [
                'type'          => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP')
            ],

            'updated_at' => [
                'type'          => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP')
            ]
        ]);

        $this->forge->addKey('id', true); //chave primária
        $this->forge->createTable('versoes');
    }

    public function down()
    {
        $this->forge->dropTable('versoes', true, true);
    }
}
