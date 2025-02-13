<?php

namespace App\Models;

use CodeIgniter\Model;

class TagihanKamar_model extends Model
{
    protected $table      = 'tagihan_kamar';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'tagihan_id';
    protected $allowedFields = [
        'tagihan_id', 'tagihan_kontrak', 'tagihan_type', 'tagihan_bulan', 'tagihan_tahun', 'tagihan_harga'
    ];
}
