<?php

namespace App\Models;


use CodeIgniter\Model;

class Kamar_model extends Model
{
    protected $table      = 'master_kamar';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'kamar_id';
    protected $allowedFields = ['kamar_kode', 'kamar_nomor', 'kamar_harga', 'id_lantai'];
}
