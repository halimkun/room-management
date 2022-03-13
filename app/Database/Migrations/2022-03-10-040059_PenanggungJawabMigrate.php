<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PenanggungJawabMigrate extends Migration
{
    public function up()
    {
        $this->forge->addField(
            [
                'id' => [
                    'type'           => 'INT',
                    'unsigned'       => true,
                    'auto_increment' => true,
                ],
                'nama' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '255',
                ],
                'jabatan' => [
                    'type'       => 'VARCHAR',
                    'constraint' => '255',
                ],
                'ket' => [
                    'type'       => 'TEXT',
                ],
                'created_at' => [
                    'type' => 'DATETIME',
                ],
                'updated_at' => [
                    'type' => 'DATETIME',
                ],
                'deleted_at' => [
                    'type' => 'DATETIME',
                ],
            ]
        );
        $this->forge->addKey('id', true);
        $this->forge->createTable('penanggungjawab', true);
    }

    public function down()
    {
        $this->forge->dropTable('penanggungjawab', true);
    }
}
