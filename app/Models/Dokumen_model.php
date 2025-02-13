<?php

namespace App\Models;

use CodeIgniter\Model;

class Dokumen_model extends Model
{
    protected $table      = 'aprs_dokumen';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id_dokumen';
    protected $allowedFields = ['namadokumen', 'dokumen', 'time', 'kode_penghuni'];
}
