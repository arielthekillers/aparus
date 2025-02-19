<?php

namespace App\Controllers;

use App\Models\Invoice_model;

class Penerimaan extends BaseController
{
    protected $invoice;

    public function __construct()
    {
        $this->invoice = new Invoice_model();
        helper(['tgl_indo', 'custom', 'rupiah', 'ruangwa']);
    }

    public function index()
    {
        $tanggal = $this->request->getGet('tanggal') ?? date('Y-m-d');

        $data = [
            'title' => 'Laporan Penerimaan',
            'tanggal' => $tanggal,
            'transaksi' => $this->invoice->getLaporanPenerimaan($tanggal)
        ];

        return view('pembayaran/penerimaan', $data);
    }
}
