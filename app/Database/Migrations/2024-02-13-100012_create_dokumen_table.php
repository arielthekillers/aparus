<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDokumenTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_dokumen' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'kode_penghuni' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'jenis_dokumen' => [
                'type' => 'ENUM',
                'constraint' => ['ktp', 'kk', 'surat_kerja', 'slip_gaji', 'lainnya'],
            ],
            'nama_dokumen' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'file_dokumen' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'keterangan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_by' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => false,
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => false,
            ],
            'deleted_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ]);

        // Primary Key
        $this->forge->addKey('id_dokumen', true);
        
        // Indexes
        $this->forge->addKey('kode_penghuni', false);
        $this->forge->addKey('jenis_dokumen', false);
        
        // Foreign Keys
        $this->forge->addForeignKey('kode_penghuni', 'aprs_penghuni', 'kode_penghuni', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('created_by', 'aprs_user', 'user_id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('aprs_dokumen');
    }

    public function down()
    {
        $this->forge->dropTable('aprs_dokumen');
    }
}