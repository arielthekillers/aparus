<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMasterTables extends Migration
{
    public function up()
    {
        // Master Rusun
        $this->forge->addField([
            'rusun_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'rusun_kode' => [
                'type' => 'VARCHAR',
                'constraint' => 5,
            ],
            'rusun_nama' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'rusun_alamat' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'rusun_deskripsi' => [
                'type' => 'TEXT',
            ],
            'rusun_foto' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'default' => 'default.png',
            ],
            'harga_air' => [
                'type' => 'DECIMAL',
                'constraint' => '8,2',
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => false,
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => false,
            ],
        ]);
        $this->forge->addKey('rusun_id', true);
        $this->forge->createTable('aprs_master_rusun');

        // Master Lantai
        $this->forge->addField([
            'lantai_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'lantai_kode' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'lantai_nama' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'lantai_kapasitas' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'id_rusun' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => false,
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => false,
            ],
        ]);
        $this->forge->addKey('lantai_id', true);
        $this->forge->createTable('aprs_master_lantai');

        // Master Kamar
        $this->forge->addField([
            'kamar_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'kamar_kode' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
            ],
            'kamar_nomor' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'kamar_harga' => [
                'type' => 'DECIMAL',
                'constraint' => '9,2',
            ],
            'id_lantai' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => false,
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => false,
            ],
        ]);
        $this->forge->addKey('kamar_id', true);
        $this->forge->createTable('aprs_master_kamar');

        // Master Kecamatan
        $this->forge->addField([
            'id_kecamatan' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_kecamatan' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
            ],
        ]);
        $this->forge->addKey('id_kecamatan', true);
        $this->forge->createTable('aprs_master_kecamatan');

        // Master Kelurahan
        $this->forge->addField([
            'id_kelurahan' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_kecamatan' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'nama_kelurahan' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
            ],
        ]);
        $this->forge->addKey('id_kelurahan', true);
        $this->forge->createTable('aprs_master_kelurahan');
    }

    public function down()
    {
        $this->forge->dropTable('aprs_master_kelurahan');
        $this->forge->dropTable('aprs_master_kecamatan');
        $this->forge->dropTable('aprs_master_kamar');
        $this->forge->dropTable('aprs_master_lantai');
        $this->forge->dropTable('aprs_master_rusun');
    }
}