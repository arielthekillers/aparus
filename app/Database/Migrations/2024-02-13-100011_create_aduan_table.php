<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAduanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_aduan' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nomor_aduan' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'unique' => true,
            ],
            'kode_penghuni' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'id_kategori' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'judul_aduan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'deskripsi_aduan' => [
                'type' => 'TEXT',
            ],
            'foto_aduan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'status_aduan' => [
                'type' => 'ENUM',
                'constraint' => ['pending', 'proses', 'selesai', 'ditolak'],
                'default' => 'pending',
            ],
            'tanggapan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_by' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'updated_by' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
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
        $this->forge->addKey('id_aduan', true);
        
        // Indexes
        $this->forge->addKey('nomor_aduan', false);
        $this->forge->addKey('kode_penghuni', false);
        $this->forge->addKey('id_kategori', false);
        $this->forge->addKey('status_aduan', false);
        
        // Foreign Keys
        $this->forge->addForeignKey('kode_penghuni', 'aprs_penghuni', 'kode_penghuni', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_kategori', 'aprs_kategori_pengaduan', 'id_kategori', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('created_by', 'aprs_user', 'user_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('updated_by', 'aprs_user', 'user_id', 'CASCADE', 'SET NULL');

        $this->forge->createTable('aprs_aduan');
    }

    public function down()
    {
        $this->forge->dropTable('aprs_aduan');
    }
}