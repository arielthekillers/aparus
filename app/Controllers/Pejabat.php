<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pejabat_model;



class Pejabat extends BaseController
{
    protected $pejabat;


    public function __construct()

    {
        helper(['rupiah', 'bulan', 'tgl_indo', 'form']);
        $this->pejabat = new Pejabat_model();
    }

    public function index()
    {
        $data['pejabat'] = $this->pejabat->findAll();
        echo view('pejabat/list', $data);
    }

    public function list()
    {
        $data['pejabat'] = $this->pejabat->findAll();
        echo view('pejabat/list', $data);
    }

    public function tambah()
    {
        echo view('pejabat/new');
    }

    public function save()
    {

        $data = [
            'nama'  => $this->request->getPost('nama'),
            'jabatan'  => $this->request->getPost('jabatan'),
            'nip'  => $this->request->getPost('nip'),
        ];
        if ($this->request->getPost('id')) {
            $data += [
                'id_pejabat'  => $this->request->getPost('id'),
            ];
        }

        if ($this->pejabat->save($data)) {
            //inisiasi flashdata jika data berhasil disimpan
            session()->setFlashdata([
                'status'    => 'Success',
                'message'   => 'Data Berhasil Disimpan',
                'color'     => 'success',
                'icon'      => 'ri-edit-2-line'
            ]);
            return redirect()->to('pejabat/list');
        } else {
            //inisiasi flashdata jika data gagal disimpan
            session()->setFlashdata([
                'status'    => 'Failed',
                'message'   => 'Data Gagal Disimpan',
                'color'     => 'danger',
                'icon'      => 'ri-error-warning-line'
            ]);
            //redirect ke halaman program list
            return redirect()->to('pejabat/list');
        }
    }

    public function edit($id = null)
    {
        $data['pejabat'] = $this->pejabat->where('id_pejabat', $id)->first();
        echo view('pejabat/edit', $data);
    }

    public function delete($id = null)
    {
        if ($this->pejabat->delete($id)) {
            //inisiasi flashdata jika data berhasil disimpan
            session()->setFlashdata([
                'status'    => 'Success',
                'message'   => 'Data Berhasil dihapus',
                'color'     => 'success',
                'icon'      => 'ri-delete-bin-line'
            ]);
            return redirect()->to('pejabat/list');
        } else {
            //inisiasi flashdata jika data gagal disimpan
            session()->setFlashdata([
                'status'    => 'Failed',
                'message'   => 'Data Gagal Dihapus',
                'color'     => 'danger',
                'icon'      => 'ri-error-warning-line'
            ]);
            //redirect ke halaman program list
            return redirect()->to('pejabat/list');
        }
        return redirect()->to('pejabat/list');
    }
}
