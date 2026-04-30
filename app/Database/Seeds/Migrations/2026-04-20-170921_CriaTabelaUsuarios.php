<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CriaTabelaUsuarios extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'nome' => ['type' => 'VARCHAR', 'constraint' => 150, 'default' => ''],
            'email'      => ['type' => 'VARCHAR', 'constraint' => 254],
            'senha'   => ['type' => 'VARCHAR', 'constraint' => 255],
            'ra'         => ['type' => 'VARCHAR', 'constraint' => 6, 'null' => false],
            'ativo'  => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
            'admin'   => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('email', false, true); // unique
        $this->forge->addKey('ra', false, true); // unique
        // Non-unique indexes for common queries
        $this->forge->addKey('ativo');
        $this->forge->addKey('admin');
        $this->forge->createTable('usuarios', true);

    }

    public function down()
    {
        $this->forge->dropTable('usuarios', true);
    }
}
