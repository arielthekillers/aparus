<?php

namespace App\Controllers;

use App\Models\ReportHunian_model;
use App\Models\Rusun_model;
use App\Models\Penghuni_model;
use App\Models\Dokumen_model;
use App\Models\Kecamatan_model;
use App\Models\Kelurahan_model;
use App\Models\Kontrak_model;
use App\Models\Kamar_model;
use App\Models\TagihanKamar_model;
use App\Models\Invoice_model;
use App\Models\AnggotaKeluarga_model;
use App\Models\InvoiceDetails_model;

class ReportHunian extends BaseController
{
    protected $reportModel;
    protected $rusun;
    protected $penghuni;
    protected $dokumen;
    protected $kecamatan;
    protected $kelurahan;
    protected $kontrak;
    protected $kamar;
    protected $tagihan;
    protected $invoice;
    protected $anggota_keluarga;
    protected $invoiceDetails;

    public function __construct()
    {
        $this->reportModel = new ReportHunian_model();
        $this->rusun = new Rusun_model();
        $this->penghuni = new Penghuni_model();
        $this->dokumen = new Dokumen_model();
        $this->kecamatan = new Kecamatan_model();
        $this->kelurahan = new Kelurahan_model();
        $this->kontrak = new Kontrak_model();
        $this->kamar = new Kamar_model();
        $this->tagihan = new TagihanKamar_model();
        $this->invoice = new Invoice_model();
        $this->anggota_keluarga = new AnggotaKeluarga_model();
        $this->invoiceDetails = new InvoiceDetails_model();
    }

    public function penghuni()
    {
        $rusun_id = $this->request->getGet('rusun');

        $data = [
            'title' => 'Laporan Penghuni',
            'penghuni' => $this->reportModel->getPenghuni($rusun_id),
            'statistik' => $this->reportModel->getStatistikPenghuni(),
            'rusun' => $this->rusun->select('rusun_id, rusun_nama as nama_rusun')->findAll(),
            'selected_rusun' => $rusun_id
        ];

        return view('report/penghuni', $data);
    }

    public function exportExcel()
    {
        // Your export logic here
    }




    public function list()
    {
        $keyword = ($this->request->getPost('keyword') ? $this->request->getPost('keyword') : "");
        if ($this->request->getPost('keyword')) {
            $penghuni = $this->penghuni->getPenghuniWithRusunAndSearch($keyword);
        } else {
            $penghuni = $this->penghuni->getPenghuniWithRusun();
        }
        $data = [
            'keyword' => $keyword,
            'penghuni' => $penghuni,
            'pager' => $this->penghuni->pager,
        ];
        return view('penghuni/list', $data);
    }




    public function statistikGender()
    {
        $rusun_id = $this->request->getGet('rusun');

        $data = [
            'title' => 'Statistik Per Jenis Kelamin',
            'statistik' => $this->reportModel->getStatistikGender($rusun_id),
            'rusun' => $this->rusun->select('rusun_id, rusun_nama')->findAll(),
            'selected_rusun' => $rusun_id
        ];

        return view('report/statistik_gender', $data);
    }
}
