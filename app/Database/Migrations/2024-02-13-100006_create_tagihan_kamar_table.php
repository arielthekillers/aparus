<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTagihanKamarTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'tagihan_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'tagihan_kontrak' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'tagihan_type' => [
                'type' => 'ENUM',
                'constraint' => ['Kamar'],
                'default' => 'Kamar',
            ],
            'tagihan_bulan' => [
                'type' => 'VARCHAR',
                'constraint' => 2,
            ],
            'tagihan_tahun' => [
                'type' => 'VARCHAR',
                'constraint' => 4,
            ],
            'tagihan_harga' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'default' => 0,
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
        $this->forge->addKey('tagihan_id', true);
        
        // Indexes
        $this->forge->addKey('tagihan_kontrak', false);
        $this->forge->addKey(['tagihan_bulan', 'tagihan_tahun'], false);
        
        // Foreign Keys
        $this->forge->addForeignKey('tagihan_kontrak', 'aprs_kontrak', 'kontrak_id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('tagihan_kamar');
    }

    public function down()
    {
        $this->forge->dropTable('tagihan_kamar');
    }
}