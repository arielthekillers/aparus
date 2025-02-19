<?php

namespace App\Models;

use CodeIgniter\Model;

class Invoice_model extends Model
{
    protected $table = 'aprs_invoice';
    protected $primaryKey = 'inv_id';
    protected $allowedFields = ['inv_nomor', 'inv_kontrak', 'inv_total', 'inv_payment', 'inv_payment_method', 'inv_payment_at', 'inv_payment_by'];

    public function getLaporanPenerimaan($tanggal)
    {
        return $this->select('*')
            ->where('DATE(inv_payment_at)', $tanggal)
            ->where('inv_payment', '2') // status sudah dibayar
            ->orderBy('inv_payment_at', 'DESC')
            ->findAll();
    }
}
