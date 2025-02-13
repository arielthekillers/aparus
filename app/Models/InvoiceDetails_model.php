<?php

namespace App\Models;

use CodeIgniter\Model;

class InvoiceDetails_model extends Model
{
    protected $table      = 'invoice_details';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'inv_detail_id';
    protected $allowedFields = [
        'inv_detail_parent', 'inv_detail_tagihan'
    ];

    function getInvoiceDetailItem($inv)
    {
        $builder = $this->db->table('invoice_details');
        $builder->select('*');
        $builder->where('inv_detail_parent', $inv);
        $builder->join('tagihan_kamar', 'inv_detail_tagihan = tagihan_id');
        return $builder->get();
    }
}
