<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateVatokenTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_vatoken' => [
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
            'virtual_account' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'token' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'expired_at' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['active', 'used', 'expired'],
                'default' => 'active',
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

        // Primary Key
        $this->forge->addKey('id_vatoken', true);
        
        // Indexes
        $this->forge->addKey('invoice_id', false);
        $this->forge->addKey('virtual_account', false);
        $this->forge->addKey('token', false);
        $this->forge->addKey('status', false);
        
        // Foreign Keys
        $this->forge->addForeignKey('invoice_id', 'aprs_invoice', 'id_invoice', 'CASCADE', 'CASCADE');

        $this->forge->createTable('aprs_vatoken');
    }

    public function down()
    {
        $this->forge->dropTable('aprs_vatoken');
    }
}