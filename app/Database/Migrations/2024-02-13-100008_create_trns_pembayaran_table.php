<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTrnsPembayaranTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pembayaran' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nomor_pembayaran' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'unique' => true,
            ],
            'invoice_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'kode_penghuni' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'metode_pembayaran' => [
                'type' => 'ENUM',
                'constraint' => ['tunai', 'transfer', 'virtual_account'],
                'default' => 'tunai',
            ],
            'bank' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'nomor_rekening' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'atas_nama' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'jumlah_pembayaran' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'bukti_pembayaran' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'status_pembayaran' => [
                'type' => 'ENUM',
                'constraint' => ['pending', 'success', 'failed', 'expired'],
                'default' => 'pending',
            ],
            'tanggal_pembayaran' => [
                'type' => 'DATETIME',
                'null' => true,
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
        $this->forge->addKey('id_pembayaran', true);
        
        // Indexes
        $this->forge->addKey('nomor_pembayaran', false);
        $this->forge->addKey('invoice_id', false);
        $this->forge->addKey('kode_penghuni', false);
        $this->forge->addKey('status_pembayaran', false);
        
        // Foreign Keys
        $this->forge->addForeignKey('invoice_id', 'aprs_invoice', 'id_invoice', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('kode_penghuni', 'aprs_penghuni', 'kode_penghuni', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('created_by', 'aprs_user', 'user_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('updated_by', 'aprs_user', 'user_id', 'CASCADE', 'SET NULL');

        $this->forge->createTable('aprs_trns_pembayaran');
    }

    public function down()
    {
        $this->forge->dropTable('aprs_trns_pembayaran');
    }
}