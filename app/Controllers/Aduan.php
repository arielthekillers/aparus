<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Aduan_model;

class Aduan extends BaseController
{
    protected $aduan;

    public function __construct()
    {
        $this->aduan = new Aduan_model();
        helper(['date', 'string']);
    }

    public function index(): string
    {
        return view('welcome_message');
    }
    //show datas in list
    public function list($status = null)
    {
        $data['status'] = (isset($status) ? $status :  'Semua');
        $data['statistik'] = $this->aduan->countAduan()->getResultArray();
        $data['aduan'] = $this->aduan->getAduanWithUser($data['status'])->getResultArray();
        $data['total'] = $this->aduan->countAllAduan();
        return view('aduan/list', $data);
    }
    public function detail(): string
    {
        return view('\Modules\Aduan\Views\list');
    }
    //add new data form
    public function new(): string
    {
        return view('\Modules\Aduan\Views\list');
    }
    //edit selected data form
    public function edit(): string
    {
        return view('\Modules\Aduan\Views\list');
    }
    //save new data
    public function save()
    {
        if (!empty($this->request->getPost('id'))) {
            //update
            $data = [
                'id_aduan'          => $this->request->getPost('id'),
                'judul'             => $this->request->getPost('judul'),
                'pengadu'           => $this->request->getPost('pengadu'),
                'deskripsi'         => $this->request->getPost('deskripsi'),
            ];
        } else {
            //insert
            $data = [
                'judul'             => $this->request->getPost('judul'),
                'pengadu'           => $this->request->getPost('pengadu'),
                'deskripsi'         => $this->request->getPost('deskripsi'),
            ];
        }

        if ($this->aduan->save($data)) {
            //inisiasi flashdata jika data berhasil disimpan
            session()->setFlashdata([
                'status'    => 'Success',
                'message'   => 'Input Data Berhasil',
                'color'     => 'success',
                'icon'      => 'ri-edit-2-line'
            ]);
            return redirect()->to('aduan/list');
        } else {
            //inisiasi flashdata jika data gagal disimpan
            session()->setFlashdata([
                'status'    => 'Failed',
                'message'   => 'Input Data Gagal',
                'color'     => 'danger',
                'icon'      => 'ri-error-warning-line'
            ]);
            //redirect ke halaman program list
            return redirect()->to('aduan/list');
        }
    }
    //update selected data
    public function update(): string
    {
        return view('\Modules\Aduan\Views\list');
    }
    //delete selected data
    public function delete(): string
    {
        return view('\Modules\Aduan\Views\list');
    }

    public function tvmedia()
    {
        $data['statistik'] = $this->aduan->countAduanWithUserToday()->getResultArray();
        $data['aduan'] = $this->aduan->getAduanWithUserToday()->getResultArray();
        $data['total'] = COUNT($data['aduan']);
        return view('Aduan\tvmedia', $data);
    }
}
