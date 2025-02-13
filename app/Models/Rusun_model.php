<?php

namespace App\Models;


use CodeIgniter\Model;

class Rusun_model extends Model
{
    protected $table      = 'master_rusun';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'rusun_id';
    protected $allowedFields = ['rusun_nama', 'rusun_kode', 'rusun_alamat', 'rusun_kode', 'rusun_deskripsi', 'rusun_foto'];
}
