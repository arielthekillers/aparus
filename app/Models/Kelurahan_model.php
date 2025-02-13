<?php

namespace App\Models;

use CodeIgniter\Model;

class Kelurahan_model extends Model
{
    protected $table      = 'master_kelurahan';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id_kelurahan';
    protected $allowedFields = [
        'id_kecamatan', 'nama_kelurahan'
    ];
}
