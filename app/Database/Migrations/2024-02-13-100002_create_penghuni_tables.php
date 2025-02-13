<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePenghuniTables extends Migration
{
    public function up()
    {
        // Tabel Penghuni
        $this->forge->addField([
            'id_penghuni' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'kode_penghuni' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'unique' => true,
            ],
            'ktp' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'unique' => true,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'tempat_lahir' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'tanggal_lahir' => [
                'type' => 'DATE',
            ],
            'jenis_kelamin' => [
                'type' => 'ENUM',
                'constraint' => ['L', 'P'],
            ],
            'agama' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'status_kawin' => [
                'type' => 'ENUM',
                'constraint' => ['belum_kawin', 'kawin', 'cerai_hidup', 'cerai_mati'],
            ],
            'pekerjaan' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'alamat_ktp' => [
                'type' => 'TEXT',
            ],
            'kecamatan' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'kelurahan' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'nomor_hp' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
            ],
            'foto' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'default' => 'default.jpg',
            ],
            'rusuntujuan' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['aktif', 'tidak_aktif', 'alumni'],
                'default' => 'aktif',
                'comment' => 'aktif=current resident, tidak_aktif=suspended, alumni=former resident'
            ],
            'tanggal_masuk' => [
                'type' => 'DATE',
            ],
            'tanggal_keluar' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'created_by' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
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

        // Primary Key dan Indexes untuk Penghuni
        $this->forge->addKey('id_penghuni', true);
        $this->forge->addKey('kode_penghuni', false);
        $this->forge->addKey('ktp', false);
        $this->forge->addKey('nama', false);
        $this->forge->addKey('status', false);
        $this->forge->addKey(['rusuntujuan', 'status'], false);
        $this->forge->addKey('created_at', false);

        // Foreign Keys untuk Penghuni
        $this->forge->addForeignKey('kecamatan', 'aprs_master_kecamatan', 'id_kecamatan', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('kelurahan', 'aprs_master_kelurahan', 'id_kelurahan', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('rusuntujuan', 'aprs_master_rusun', 'rusun_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('created_by', 'aprs_user', 'user_id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('aprs_penghuni');

        // Tabel Anggota Keluarga
        $this->forge->addField([
            'id_anggota' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'kode_penghuni' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'nama_anggota' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'hubungan' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
            ],
            'tanggal_lahir' => [
                'type' => 'DATE',
            ],
            'jenis_kelamin' => [
                'type' => 'ENUM',
                'constraint' => ['L', 'P'],
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

        // Primary Key dan Indexes untuk Anggota Keluarga
        $this->forge->addKey('id_anggota', true);
        $this->forge->addKey('kode_penghuni', false);
        $this->forge->addKey('nama_anggota', false);
        $this->forge->addKey(['kode_penghuni', 'hubungan'], false);

        // Foreign Keys untuk Anggota Keluarga
        $this->forge->addForeignKey('kode_penghuni', 'aprs_penghuni', 'kode_penghuni', 'CASCADE', 'CASCADE');

        $this->forge->createTable('aprs_anggota_keluarga');

        // Add constraints for nomor_hp and ktp
        $this->db->query('ALTER TABLE aprs_penghuni ADD CONSTRAINT chk_nomor_hp CHECK (nomor_hp REGEXP "^[0-9]{10,15}$")');
        $this->db->query('ALTER TABLE aprs_penghuni ADD CONSTRAINT chk_ktp CHECK (ktp REGEXP "^[0-9]{16}$")');
    }

    public function down()
    {
        $this->forge->dropTable('aprs_anggota_keluarga');
        $this->forge->dropTable('aprs_penghuni');
    }
}
