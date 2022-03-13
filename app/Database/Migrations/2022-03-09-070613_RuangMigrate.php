<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RuangMigrate extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'kode' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'ruang' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'lantai' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'keterangan' => [
                'type' => 'TEXT',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('ruang', true);
    }

    public function down()
    {
        $this->forge->dropTable('ruang', true);
    }
}
