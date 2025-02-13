<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Invoice_model;
use App\Models\Kontrak_model;
use App\Models\Penghuni_model;

class Transactions extends BaseController
{
    protected $invoice;
    protected $kontrak;
    protected $penghuni;
    public function __construct()
    {
        //helper(['string']);
        helper(['ruangwa']);
        $this->invoice = new Invoice_model();
        $this->kontrak = new Kontrak_model();
        $this->penghuni = new Penghuni_model();
    }

    public function callback()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        if ($data) {
            $data['invoice'] = $this->invoice->where('inv_payment_va', $data['number'])->first();
            $data["kontrak"] = $this->kontrak->where(['kontrak_id' => $data['invoice']['inv_kontrak']])->first();
            $data["penghuni"] = $this->penghuni->where(['kode_penghuni' => $data["kontrak"]['penghuni']])->first();
            if ($data['invoice']) {
                //eksekusi
                $form_data = [
                    'inv_id' => $data['invoice']['inv_id'],
                    'inv_payment' => '2',
                    'inv_payment_at' => $data['trx_date'],
                ];
                if ($this->invoice->save($form_data)) {
                    $response = [
                        'code'   => '00',
                        'message' =>  'success',
                    ];
                    if ($data["penghuni"]['kontak']) {
                        $inv = $data["invoice"]['inv_nomor'];
                        $message = "Selamat...%0a%0aPerbayaran tagihan dengan nomor invoice : *$inv* berhasil dilakukan.%0a%0aTerima kasih telah membayar tagihan anda tepat waktu%0a%0aSalam kami, *Admin Aparus 2.0*.";
                        send_message($data["penghuni"]['kontak'], $message);
                    }
                }
            } else {
                $response = [
                    'code'   => '99',
                    'message' =>  'Data tidak ditemukan',
                ];
            }
            return json_encode($response);
        } else {
            echo "";
        }
    }
}
