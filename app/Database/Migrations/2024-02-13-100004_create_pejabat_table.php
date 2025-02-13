<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePejabatTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pejabat' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_pejabat' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'nip' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true,
            ],
            'jabatan' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['aktif', 'nonaktif'],
                'default' => 'aktif',
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
        $this->forge->addKey('id_pejabat', true);
        
        // Indexes
        $this->forge->addKey('nama_pejabat', false);
        $this->forge->addKey('nip', false);
        $this->forge->addKey('status', false);
        
        // Foreign Keys
        $this->forge->addForeignKey('created_by', 'aprs_user', 'user_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('updated_by', 'aprs_user', 'user_id', 'CASCADE', 'SET NULL');

        $this->forge->createTable('aprs_pejabat');
    }

    public function down()
    {
        $this->forge->dropTable('aprs_pejabat');
    }
}