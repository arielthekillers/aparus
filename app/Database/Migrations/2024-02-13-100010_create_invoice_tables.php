<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateInvoiceTables extends Migration
{
    public function up()
    {
        // Tabel Invoice
        $this->forge->addField([
            'inv_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'inv_nomor' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
            ],
            'inv_kontrak' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'inv_total' => [
                'type' => 'DECIMAL',
                'constraint' => '9,2',
            ],
            'inv_payment' => [
                'type' => 'INT',
                'constraint' => 2,
            ],
            'inv_payment_method' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
            ],
            'inv_payment_va' => [
                'type' => 'VARCHAR',
                'constraint' => 25,
            ],
            'inv_payment_by' => [
                'type' => 'INT',
                'constraint' => 25,
                'unsigned' => true,
            ],
            'inv_payment_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'inv_created_at' => [
                'type' => 'TIMESTAMP',
                'null' => false,
                'default' => new \CodeIgniter\Database\RawSql('CURRENT_TIMESTAMP'),
            ],
            'inv_updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
                'default' => new \CodeIgniter\Database\RawSql('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
            ],
        ]);

        // Primary Key
        $this->forge->addKey('inv_id', true);

        // Indexes
        $this->forge->addKey('inv_nomor', false);
        $this->forge->addKey('inv_kontrak', false);

        // Foreign Keys
        $this->forge->addForeignKey('inv_kontrak', 'aprs_kontrak', 'kontrak_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('inv_payment_by', 'aprs_user', 'user_id', 'CASCADE', 'CASCADE');

        // Create Table
        $this->forge->createTable('aprs_invoice');

        // Create Trigger
        $this->db->query("
            CREATE TRIGGER OnSuccessPayment 
            BEFORE UPDATE ON aprs_invoice 
            FOR EACH ROW 
            BEGIN
                IF (NEW.inv_payment = 2) THEN
                    UPDATE aprs_invoice_details 
                    SET inv_detail_status = 'Lunas' 
                    WHERE inv_detail_parent = OLD.inv_nomor;
                END IF;
            END
        ");
    }

    public function down()
    {
        // Drop trigger first
        $this->db->query("DROP TRIGGER IF EXISTS OnSuccessPayment");

        // Drop table
        $this->forge->dropTable('aprs_invoice');
    }
}
