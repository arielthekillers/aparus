<?php

namespace App\Models;

use CodeIgniter\Model;

class Kecamatan_model extends Model
{
    protected $table      = 'master_kecamatan';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id_kecamatan';
    protected $allowedFields = [
        'nama_kecamatan'
    ];
}
