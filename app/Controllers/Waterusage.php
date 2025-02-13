<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Waterusage_model;
use App\Models\Rusun_model;
use App\Models\Lantai_model;
use App\Models\Kamar_model;

class Waterusage extends BaseController
{
    protected $waterusage;
    protected $rusun;
    protected $lantai;
    protected $kamar;

    public function __construct()
    {
        $this->waterusage = new Waterusage_model();
        $this->rusun = new Rusun_model();
        $this->lantai = new Lantai_model();
        $this->kamar = new Kamar_model();
        //helper(['string']);
    }

    public function index()
    {
        $data['waterusage'] = $this->waterusage->findAll();
        return view('shortcut/list', $data);
    }
    //show datas in list
    public function hargaAir()
    {
        $data['hargaair'] = $this->rusun->findAll();
        return view('waterusage/hargaair', $data);
    }
    public function catatAir($bulan = null, $tahun = null)
    {
        $rusun = $this->request->getPost('rusun');
        $lantai = $this->request->getPost('lantai');
        if (empty($this->request->getPost('rusun')) && empty($this->request->getPost('lantai'))) {
            $data['rusun'] = $this->rusun->findAll();
            return view('waterusage/lokasi', $data);
        } else {
            $data['catatanair'] = $this->waterusage->getWaterUsage($rusun, $lantai)->getResultArray();
            $data['kamar'] = $this->kamar->where('id_lantai', $lantai)->findAll();
            $data['rusun'] = $this->rusun->where('rusun_id', $rusun)->first();
            $data['lantai'] = $this->lantai->where('lantai_id', $lantai)->first();
            return view('waterusage/daftarair', $data);
        }
    }
    public function datalantai()
    {
        $parent =  $this->request->getPost('parent');
        $data = $this->lantai->where(['id_rusun' => $parent])->orderBy('lantai_id', 'asc')->findAll();
        return json_encode($data);
    }
}
