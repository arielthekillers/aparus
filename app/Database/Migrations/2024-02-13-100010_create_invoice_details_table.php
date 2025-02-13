<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateInvoiceDetailsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'inv_detail_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'inv_detail_parent' => [
                'type' => 'VARCHAR',
                'constraint' => 16,
            ],
            'inv_detail_tagihan' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'inv_detail_status' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
        ]);

        // Primary Key
        $this->forge->addKey('inv_detail_id', true);
        
        // Indexes
        $this->forge->addKey('inv_detail_parent', false);
        $this->forge->addKey('inv_detail_tagihan', false);
        
        // Foreign Keys
        $this->forge->addForeignKey('inv_detail_parent', 'aprs_invoice', 'inv_nomor', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('inv_detail_tagihan', 'aprs_tagihan_kamar', 'tagihan_id', 'CASCADE', 'CASCADE');

        // Create Table
        $this->forge->createTable('aprs_invoice_details');
    }

    public function down()
    {
        $this->forge->dropTable('aprs_invoice_details');
    }
}