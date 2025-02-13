<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateShortcutTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_shortcut' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'nama_menu' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'url' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'icon' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'urutan' => [
                'type' => 'INT',
                'constraint' => 5,
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
        ]);

        // Primary Key
        $this->forge->addKey('id_shortcut', true);
        
        // Indexes
        $this->forge->addKey('user_id', false);
        
        // Foreign Keys
        $this->forge->addForeignKey('user_id', 'aprs_user', 'user_id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('aprs_shortcut');
    }

    public function down()
    {
        $this->forge->dropTable('aprs_shortcut');
    }
}