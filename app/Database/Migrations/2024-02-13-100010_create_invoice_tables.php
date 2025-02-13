<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateInvoiceTables extends Migration
{
    public function up()
    {
        // Tabel Invoice
        $this->forge->addField([
            'invoice_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nomor_invoice' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'unique' => true,
            ],
            'kode_penghuni' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'tanggal_invoice' => [
                'type' => 'DATE',
            ],
            'total_tagihan' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'status_pembayaran' => [
                'type' => 'ENUM',
                'constraint' => ['pending', 'partial', 'paid'],
                'default' => 'pending',
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
        $this->forge->addKey('invoice_id', true);
        $this->forge->addForeignKey('kode_penghuni', 'aprs_penghuni', 'kode_penghuni', 'CASCADE', 'CASCADE');
        $this->forge->createTable('aprs_invoice');

        // Tabel Invoice Details
        $this->forge->addField([
            'detail_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'invoice_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'jenis_tagihan' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'deskripsi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'jumlah' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
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
        $this->forge->addKey('detail_id', true);
        $this->forge->addForeignKey('invoice_id', 'aprs_invoice', 'invoice_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('aprs_invoice_details');
    }

    public function down()
    {
        $this->forge->dropTable('aprs_invoice_details');
        $this->forge->dropTable('aprs_invoice');
    }
}
