<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAnggotaKeluargaTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_anggotakeluarga' => [
                'type' => 'INT',
                'constraint' => 20,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'kode_penghuni' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
            ],
            'jenis_kelamin' => [
                'type' => 'ENUM',
                'constraint' => ['L', 'P'],
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
            ],
            'pendidikan' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'pendapatan' => [
                'type' => 'DECIMAL',
                'constraint' => '12,0',
            ],
            'tanggal_lahir' => [
                'type' => 'DATE',
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
        $this->forge->addKey('id_anggotakeluarga', true);
        
        // Indexes
        $this->forge->addKey('kode_penghuni', false);
        $this->forge->addKey('nama', false);
        
        // Foreign Key
        $this->forge->addForeignKey('kode_penghuni', 'aprs_penghuni', 'kode_penghuni', 'CASCADE', 'CASCADE');

        $this->forge->createTable('aprs_anggotakeluarga');
    }

    public function down()
    {
        $this->forge->dropTable('aprs_anggotakeluarga');
    }
}