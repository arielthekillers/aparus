<?php

namespace App\Models;

use CodeIgniter\Model;

class Invoice_model extends Model
{
    protected $table      = 'invoice';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'inv_id';
    protected $allowedFields = [
        'inv_nomor', 'inv_kontrak', 'inv_total', 'inv_payment', 'inv_payment_method', 'inv_payment_va', 'inv_payment_by', 'inv_payment_at'
    ];

    public function getInvoiceByMonth($month)
    {
        $this->builder()
            ->select('inv_id,inv_nomor,inv_total, inv_payment,inv_created_at, inv_payment_method, inv_payment_va,inv_payment_at, nama')
            ->join('kontrak', 'kontrak_id = inv_kontrak', 'LEFT')
            ->join('penghuni', 'kontrak.penghuni = penghuni.kode_penghuni', 'LEFT')
            //->join('kontrak', 'kontrak.penghuni = penghuni.kode_penghuni', 'LEFT')
            ->orderBy('inv_created_at', 'DESC');
        return $this->paginate(5, 'invoice');
    }
}
