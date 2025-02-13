<?php

namespace App\Models;

use CodeIgniter\Model;

class Pejabat_model extends Model
{
    protected $table      = 'pejabat';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id_pejabat';
    protected $allowedFields = [
        'nama', 'nip', 'jabatan'
    ];
}
