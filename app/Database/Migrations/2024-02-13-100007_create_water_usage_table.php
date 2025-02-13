<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateWaterUsageTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_water' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'kode_penghuni' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'periode' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'meter_awal' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'default' => 0,
            ],
            'meter_akhir' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'default' => 0,
            ],
            'pemakaian' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'default' => 0,
            ],
            'biaya_per_meter' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'default' => 0,
            ],
            'total_biaya' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'default' => 0,
            ],
            'foto_meter' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['pending', 'verified', 'rejected'],
                'default' => 'pending',
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
        $this->forge->addKey('id_water', true);
        
        // Indexes
        $this->forge->addKey('kode_penghuni', false);
        $this->forge->addKey(['periode', 'kode_penghuni'], false);
        $this->forge->addKey('status', false);
        
        // Foreign Keys
        $this->forge->addForeignKey('kode_penghuni', 'aprs_penghuni', 'kode_penghuni', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('created_by', 'aprs_user', 'user_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('updated_by', 'aprs_user', 'user_id', 'CASCADE', 'SET NULL');

        $this->forge->createTable('aprs_water_usage');
    }

    public function down()
    {
        $this->forge->dropTable('aprs_water_usage');
    }
}