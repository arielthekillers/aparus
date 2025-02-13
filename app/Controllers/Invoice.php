<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Invoice_model;
use App\Models\InvoiceDetails_model;
use App\Models\Kontrak_model;
use App\Models\Penghuni_model;

class Invoice extends BaseController
{
    protected $invoice;
    protected $invoiceDetails;
    protected $kontrak;
    protected $penghuni;

    public function __construct()
    {
        helper(['tgl_indo', 'custom', 'rupiah']);
        $this->invoice = new Invoice_model();
        $this->invoiceDetails = new InvoiceDetails_model();
        $this->kontrak = new Kontrak_model();
        $this->penghuni = new Penghuni_model();
    }

    public function index(): string
    {
        return view('welcome_message');
    }

    public function getInvoiceByKontrak()
    {
        $id =  $this->request->getPost('id');
        $data = $this->invoice->where(['inv_kontrak' => $id, 'inv_payment' => '1'])->findAll();
        return json_encode($data);
    }
    public function list($month = null)
    {
        if ($month) {
            $invoice = $this->invoice->getInvoiceByMonth($month);
        } else {
            $invoice = $this->invoice->getInvoiceByMonth(date('m'));
        }
        $data = [
            'bulan' => $month,
            'invoice' => $invoice,
            'pager' => $this->invoice->pager,
        ];
        return view('invoice/list', $data);
    }
    public function detail($inv = null)
    {
        if ($inv) {
            $data['invoice'] = $this->invoice->where('inv_nomor', $inv)->first();
            $data['invoiceDetail'] = $this->invoiceDetails->getInvoiceDetailItem($data['invoice']['inv_nomor'])->getResultArray();
            $data["kontrak"] = $this->kontrak->where(['kontrak_id' => $data['invoice']['inv_kontrak']])->first();
            $data["penghuni"] = $this->penghuni->where(['kode_penghuni' => $data["kontrak"]['penghuni']])->first();
            return view('invoice/detail', $data);
        } else {
            return redirect()->to('invoice/list');
        }
    }
}
