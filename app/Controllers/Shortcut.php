<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Shortcut_model;


class Shortcut extends BaseController
{
    protected $shortcut;


    public function __construct()
    {
        $this->shortcut = new Shortcut_model();
        

        helper(['string']);
    }

    public function index()
    {
        $data['shortcut'] = $this->shortcut->findAll();
        return view('shortcut/list', $data);
    }
    //show datas in list
    public function list()
    {
        $data['shortcut'] = $this->shortcut->findAll();
        return view('shortcut/list', $data);
    }
    //show details of selected data 
    public function detail()
    {
        $id =  $this->request->getPost('id');
        $data = $this->shortcut->where(['id_shortcut' => $id])->first();
        return json_encode($data);
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
        if ($_FILES['foto']['name'] != "") {
            if ($this->request->getFile('foto')->isValid()) {
                $validationRule = [
                    'foto' => [
                        'label' => 'Foto File',
                        'rules' => 'uploaded[foto]' . '|mime_in[foto,image/jpg,image/JPG,image/jpeg,image/gif,image/png,image/webp]' . '|max_size[foto,5120]',
                    ],
                ];

                if (!$this->validate($validationRule)) {
                    session()->setFlashdata([
                        'status'    => 'Failed',
                        'message'   => 'Upload Foto Gagal. Ekstensi File tidak diperbolehkan atau ukuran file terlalu besar',
                        'color'     => 'danger',
                        'icon'      => 'ri-error-warning-line'
                    ]);
                    //redirect ke halaman program list
                    return redirect()->to('shortcut/list');
                    exit;
                } else {
                    $dok = $this->request->getFile('foto');
                    $newName = $dok->getRandomName();
                    $dok->move('./uploads/shortcut/', $newName);
                    $this->generateThumbs($newName);
                    $data = [
                        'nama'        => $this->request->getPost('nama'),
                        'deskripsi'   => $this->request->getPost('deskripsi'),
                        'link'   => $this->request->getPost('link'),
                        'icon'        => $newName,
                    ];
                    if ($this->request->getPost('id')) {
                        if ($this->request->getPost('fotolama') != 'default.png') {
                            unlink("uploads/shortcut/_small/" . $this->request->getPost('fotolama'));
                            unlink("uploads/shortcut/" . $this->request->getPost('fotolama'));
                        }
                    }
                }
            }
        } else {
            $data = [
                'nama'        => $this->request->getPost('nama'),
                'deskripsi'   => $this->request->getPost('deskripsi'),
                'link'   => $this->request->getPost('link'),
            ];
        }
        if ($this->request->getPost('id')) {
            $data += [
                'id_shortcut'             => $this->request->getPost('id'),
            ];
        }

        if ($this->shortcut->save($data)) {
            //inisiasi flashdata jika data berhasil disimpan
            session()->setFlashdata([
                'status'    => 'Success',
                'message'   => 'Update Data Berhasil',
                'color'     => 'success',
                'icon'      => 'ri-edit-2-line'
            ]);
            return redirect()->to('shortcut/list');
        } else {
            //inisiasi flashdata jika data gagal disimpan
            session()->setFlashdata([
                'status'    => 'Failed',
                'message'   => 'Update Data Gagal',
                'color'     => 'danger',
                'icon'      => 'ri-error-warning-line'
            ]);
            //redirect ke halaman program list
            return redirect()->to('shortcut/list');
        }
    }
    //update selected data

    //delete selected data
    public function delete($id)
    {
        //mengupdate data ke database dan mengirimkan statusnya
        if ($this->shortcut->delete($id)) {
            //inisiasi flashdata jika data berhasil disimpan
            session()->setFlashdata([
                'status'    => 'Success',
                'message'   => 'Hapus Data Berhasil',
                'color'     => 'success',
                'icon'      => 'ri-delete-bin-2-line'
            ]);
            //redirect ke halaman program list
            return redirect()->to('shortcut/list');
        } else {
            //inisiasi flashdata jika data gagal disimpan
            session()->setFlashdata([
                'status'    => 'Failed',
                'message'   => 'Hapus Data Gagal',
                'color'     => 'danger',
                'icon'      => 'ri-error-warning-line'
            ]);
            //redirect ke halaman program list
            return redirect()->to('shortcut/list');
        }
    }
    private function generateThumbs($newName = null)
    {
        $image = \Config\Services::image('gd');
        $image->withFile('./uploads/shortcut/' . $newName)
            ->resize(400, 180, true, 'width')
            ->save('./uploads/shortcut/_small/' . $newName);
    }
    public function loadShortcut()
    {
        $data['shortcut'] = $this->shortcut->findAll();
        return view('shortcut/view', $data);
    }
}
