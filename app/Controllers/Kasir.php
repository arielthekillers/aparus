<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Invoice_model;
use App\Models\InvoiceDetails_model;
use App\Models\Kontrak_model;
use App\Models\Penghuni_model;

class Kasir extends BaseController
{
    protected $invoice;
    protected $invoiceDetails;
    protected $kontrak;
    protected $penghuni;

    public function __construct()
    {
        helper(['tgl_indo', 'custom', 'rupiah', 'ruangwa']);
        $this->invoice = new Invoice_model();
        $this->invoiceDetails = new InvoiceDetails_model();
        $this->kontrak = new Kontrak_model();
        $this->penghuni = new Penghuni_model();
    }

    public function index()
    {
        return view('kasir/kasir');
    }
    public function invoice($inv = null)
    {
        if ($this->request->getGet('keyword')) {
            $data['kontrak'] = $this->kontrak->getSearchKontrakWithPenghuniAndKamar($this->request->getGet('keyword'))->getResultArray();
            return view('pembayaran/search', $data);
        } else {
            return view('pembayaran/search');
        }
    }
    public function bayar($inv = null)
    {
        if ($inv) {
            $data['invoice'] = $this->invoice->where('inv_nomor', $inv)->first();
            $data['invoiceDetail'] = $this->invoiceDetails->getInvoiceDetailItem($data['invoice']['inv_nomor'])->getResultArray();
            $data["kontrak"] = $this->kontrak->where(['kontrak_id' => $data['invoice']['inv_kontrak']])->first();
            $data["penghuni"] = $this->penghuni->where(['kode_penghuni' => $data["kontrak"]['penghuni']])->first();
            return view('pembayaran/kasir', $data);
        } else {
            return redirect()->to('kasir/invoice/');
        }
    }
    public function prosesbayar($inv = null)
    {
        if ($inv) {
            $data["kontrak"] = $this->kontrak->where(['kontrak_id' => $this->request->getPost('invoice_kontrak')])->first();
            $data["penghuni"] = $this->penghuni->where(['kode_penghuni' => $data["kontrak"]['penghuni']])->first();
            //mengnisiasi post dari form ke dalam array
            date_default_timezone_set('Asia/Makassar');
            $form_data = [
                'inv_id'  => $this->request->getPost('invoice_id'),
                'inv_payment'  => '2',
                'inv_payment_method'  => 'Tunai',
                'inv_payment_by'  => $this->request->getPost('petugas'),
                'inv_payment_at' => date('Y-m-d H:i:s')
            ];

            if ($this->invoice->save($form_data)) {
                $form_data2 = [
                    'inv_detail_parent'  => $this->request->getPost('invoice_nomor'),
                    'inv_detail_status'  => 'Lunas'
                ];
                $this->invoiceDetails->save($form_data2);
                if ($data["penghuni"]['kontak']) {
                    $message = "Selamat...%0a%0aPerbayaran tagihan dengan nomor invoice : *$inv* berhasil dilakukan.%0a%0aTerima kasih telah membayar tagihan anda tepat waktu%0a%0aSalam kami, *Admin Aparus 2.0*.";
                    send_message($data["penghuni"]['kontak'], $message);
                }
                return redirect()->to('kasir/konfirmasi/' . $this->request->getPost('invoice_nomor'));
            } else {
                return redirect()->to('kasir/konfirmasi/' . $this->request->getPost('invoice_nomor'));
            }
        } else {
            return redirect()->to('kasir/invoice/');
        }
    }
    public function konfirmasi($inv = null)
    {
        if ($inv) {
            $data['invoice'] = $this->invoice->where('inv_nomor', $inv)->first();
            $data['invoiceDetail'] = $this->invoiceDetails->getInvoiceDetailItem($data['invoice']['inv_nomor'])->getResultArray();
            $data["kontrak"] = $this->kontrak->where(['kontrak_id' => $data['invoice']['inv_kontrak']])->first();
            $data["penghuni"] = $this->penghuni->where(['kode_penghuni' => $data["kontrak"]['penghuni']])->first();
            return view('pembayaran/konfirmasi', $data);
        } else {
            return redirect()->to('kasir/invoice/');
        }
    }
}
