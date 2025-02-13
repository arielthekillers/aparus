<?php

namespace App\Models;

use CodeIgniter\Model;

class InvoiceDetails_model extends Model
{
    protected $table            = 'invoice_details';  // Without prefix
    protected $primaryKey       = 'inv_detail_id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'inv_detail_parent',
        'inv_detail_tagihan',
        'inv_detail_status'
    ];

    public function getInvoiceDetailItem($inv)
    {
        return $this->db->table($this->table)
            ->select('*')
            ->where('inv_detail_parent', $inv)
            ->join('tagihan_kamar', 'inv_detail_tagihan = tagihan_id')  // Without prefix
            ->get();
    }
}
