<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Invoice_model;
use App\Models\InvoiceDetails_model;
use App\Models\Kontrak_model;
use App\Models\Penghuni_model;

class Payment extends BaseController
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
        ///
    }

    public function auth()
    {
        //initiate post data
        $postData = array(
            'username' => 'generateva',
            'password' => '123456',
        );
        // Setup cURL
        $url = getenv('va.BankKaltimUrlEndPoint') . '/api/user/auth';
        $ch = curl_init($url);
        curl_setopt_array($ch, array(
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
            CURLOPT_POSTFIELDS => json_encode($postData)
        ));
        // Send the request
        $response = json_decode(curl_exec($ch));
        print_r($response);
        session()->set('barrier', $response['token']);
        curl_close($ch);
    }
    public function generateVirtualAccount($token)
    {
        if ($token) {
        }
        $token = 'token';
        //initiate post data
        $postData = array(
            'number' => '0099123451234512345',
            'name' => 'andi',
            'amount' => '10000',
            'description' => 'generateva12345',
        );
        // Setup cURL
        $ch = curl_init(getenv('va.BankKaltimUrlEndPoint') . '/api/va/create');
        curl_setopt_array($ch, array(
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization : Bearer' . $token,
            ),
            CURLOPT_POSTFIELDS => json_encode($postData)
        ));
        // Send the request
        $response = json_decode(curl_exec($ch));
        print_r($response);
        curl_close($ch);
    }
    public function status($inv)
    {
        $data['invoice'] = $this->invoice->where('inv_nomor', $inv)->first();
        $status = array('status' => $data['invoice']['inv_payment']);
        return json_encode($status);
    }
    public function confirm($inv)
    {
        $data['invoice'] = $this->invoice->where('inv_nomor', $inv)->first();
        $data['invoiceDetail'] = $this->invoiceDetails->getInvoiceDetailItem($data['invoice']['inv_nomor'])->getResultArray();
        $data["kontrak"] = $this->kontrak->where(['kontrak_id' => $data['invoice']['inv_kontrak']])->first();
        $data["penghuni"] = $this->penghuni->where(['kode_penghuni' => $data["kontrak"]['penghuni']])->first();
        return view('pembayaran/konfirmasi', $data);
    }
}
