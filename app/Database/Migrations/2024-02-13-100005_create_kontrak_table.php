<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKontrakTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'kontrak_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nomor_kontrak' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'unique' => true,
            ],
            'penghuni' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'kamar' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'tgl_awal_kontrak' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'tgl_akhir_kontrak' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'status_kontrak' => [
                'type' => 'ENUM',
                'constraint' => ['Daftar Tunggu', 'Terkontrak', 'Selesai', 'Dibatalkan'],
                'default' => 'Daftar Tunggu',
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
        $this->forge->addKey('kontrak_id', true);
        
        // Indexes
        $this->forge->addKey('nomor_kontrak', false);
        $this->forge->addKey('penghuni', false);
        $this->forge->addKey('kamar', false);
        $this->forge->addKey('status_kontrak', false);
        
        // Foreign Keys
        $this->forge->addForeignKey('penghuni', 'aprs_penghuni', 'kode_penghuni', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('kamar', 'aprs_master_kamar', 'kamar_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('created_by', 'aprs_user', 'user_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('updated_by', 'aprs_user', 'user_id', 'CASCADE', 'SET NULL');

        $this->forge->createTable('aprs_kontrak');
    }

    public function down()
    {
        $this->forge->dropTable('aprs_kontrak');
    }
}