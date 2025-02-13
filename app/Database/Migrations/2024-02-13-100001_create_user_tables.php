<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserTables extends Migration
{
    public function up()
    {
        // User Table
        $this->forge->addField([
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_nick' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'user_nama' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'user_nik' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'user_email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'avatar' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'default' => 'blank.jpg',
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'default' => 'Non Aktif',
            ],
        ]);
        $this->forge->addKey('user_id', true);
        $this->forge->createTable('aprs_user');

        // Role Table
        $this->forge->addField([
            'role_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'role_name' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
        ]);
        $this->forge->addKey('role_id', true);
        $this->forge->createTable('aprs_role');

        // Role Assign Table
        $this->forge->addField([
            'role_assign_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'id_role' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'id_rusun' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
        ]);
        $this->forge->addKey('role_assign_id', true);
        $this->forge->createTable('aprs_role_assign');
    }

    public function down()
    {
        $this->forge->dropTable('aprs_role_assign');
        $this->forge->dropTable('aprs_role');
        $this->forge->dropTable('aprs_user');
    }
}