<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TagihanKamar_model;
use App\Models\Kontrak_model;
use App\Models\Kamar_model;
use App\Models\Invoice_model;
use App\Models\InvoiceDetails_model;

class Automation extends BaseController
{
    protected $tagihanKamar;
    protected $kontrak;
    protected $kamar;
    protected $invoice;
    protected $invoiceDetails;

    public function __construct()
    {
        $this->tagihanKamar = new TagihanKamar_model();
        $this->kontrak = new Kontrak_model();
        $this->kamar = new Kamar_model();
        $this->invoice = new Invoice_model();
        $this->invoiceDetails = new InvoiceDetails_model();
        //helper(['string']);
    }

    public function index()
    {
        echo "test";
    }

    public function generate_tagihan_kamar_bulanan()
    {

        $dataKontrak = $this->kontrak->where(['status_kontrak' => 'Terkontrak'])->findAll();
        foreach ($dataKontrak as $k) {
            $dataKamar = $this->kamar->where(['kamar_id' => $k['kamar']])->first();
            $data = [
                'tagihan_kontrak'  => $k['kontrak_id'],
                'tagihan_type'  => 'Kamar',
                'tagihan_bulan'  => date('m'),
                'tagihan_tahun'  => date('Y'),
                'tagihan_harga'  => $dataKamar['kamar_harga'],
            ];
            $this->tagihanKamar->save($data);
        }
    }
    public function generate_invoice_bulanan()
    {
        $dataKontrak = $this->kontrak->where(['status_kontrak' => 'Terkontrak'])->findAll();
        foreach ($dataKontrak as $dk) {
            // invoice status
            // 1- menunggu pembayaran
            // 2- lunas
            // 3- dibatalkan
            $invoiceData = [
                'inv_nomor'  => rand(111111111111111, 999999999999999),
                'inv_kontrak'  => $dk['kontrak_id'],
                'inv_payment'  => 1,
            ];
            if (!empty($invoiceData)) {
                $this->invoice->save($invoiceData);
                $inv_id = $this->invoice->insertID;
                $tagihan = $this->tagihanKamar->where(['tagihan_kontrak' => $invoiceData['inv_kontrak'], 'tagihan_bulan' => date('m')])->findAll();
                $total = 0;
                foreach ($tagihan as $tg) {
                    $invoiceDetailsData = [
                        'inv_detail_parent' => $invoiceData['inv_nomor'],
                        'inv_detail_tagihan' => $tg['tagihan_id']
                    ];
                    $this->invoiceDetails->save($invoiceDetailsData);
                    $total = $total + $tg['tagihan_harga'];
                }
                $invoiceDataUpdate = [
                    'inv_id'  => $inv_id,
                    'inv_total'  => $total,
                ];
                $this->invoice->save($invoiceDataUpdate);
            }
        }
    }
}
