<?php

namespace App\Models;

use CodeIgniter\Model;

class Anggotakeluarga_model extends Model
{
    protected $table      = 'anggotakeluarga';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id_anggotakeluarga';
    protected $allowedFields = [
        'kode_penghuni', 'nama', 'jenis_kelamin', 'status', 'pendidikan', 'pendapatan', 'tanggal_lahir', 'last_update'
    ];
}
