<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KegiatanMigrate extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'agenda'      => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'ruang'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'tanggal'     => [
                'type'       => 'DATETIME',
            ],
            'pj' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'keterangan'  => [
                'type'       => 'TEXT',
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'created_at'  => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
            'updated_at'  => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
            'deleted_at'  => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('kegiatan', true);
    }

    public function down()
    {
        $this->forge->dropTable('kegiatan', true);
    }
}
