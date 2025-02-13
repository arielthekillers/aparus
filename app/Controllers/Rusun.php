<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Rusun_model;
use App\Models\Lantai_model;
use App\Models\Kamar_model;

class Rusun extends BaseController
{
    protected $rusun;
    protected $lantai;
    protected $kamar;

    public function __construct()
    {
        $this->rusun = new Rusun_model();
        $this->lantai = new Lantai_model();
        $this->kamar = new Kamar_model();
        helper(['string']);
    }

    public function index()
    {
        $data['rusun'] = $this->rusun->findAll();
        return view('rusun/list', $data);
    }
    //show datas in list
    public function list()
    {
        $data['rusun'] = $this->rusun->findAll();
        return view('rusun/list', $data);
    }
    //show details of selected data 
    public function detail()
    {
        $id =  $this->request->getPost('id');
        $data = $this->rusun->where(['rusun_id' => $id])->first();
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
                    return redirect()->to('rusun/list');
                    exit;
                } else {
                    $dok = $this->request->getFile('foto');
                    $newName = $dok->getRandomName();
                    $dok->move('./uploads/rusun/', $newName);
                    $this->generateThumbs($newName);
                    $data = [
                        'rusun_nama'        => $this->request->getPost('namaRusun'),
                        'rusun_kode'        => strtoupper(strval($this->request->getPost('kodeBlok'))),
                        'rusun_alamat'      => $this->request->getPost('alamat'),
                        'rusun_deskripsi'   => $this->request->getPost('deskripsi'),
                        'rusun_foto'        => $newName,
                    ];
                    if ($this->request->getPost('id')) {
                        if ($this->request->getPost('fotolama') != 'default.png') {
                            unlink("uploads/rusun/_small/" . $this->request->getPost('fotolama'));
                            unlink("uploads/rusun/" . $this->request->getPost('fotolama'));
                        }
                    }
                }
            }
        } else {
            $data = [
                'rusun_nama'             => $this->request->getPost('namaRusun'),
                'rusun_kode'             => $this->request->getPost('kodeBlok'),
                'rusun_alamat'         => $this->request->getPost('alamat'),
                'rusun_deskripsi'         => $this->request->getPost('deskripsi'),
            ];
        }
        if ($this->request->getPost('id')) {
            $data += [
                'rusun_id'             => $this->request->getPost('id'),
            ];
        }

        if ($this->rusun->save($data)) {
            //inisiasi flashdata jika data berhasil disimpan
            session()->setFlashdata([
                'status'    => 'Success',
                'message'   => 'Update Data Berhasil',
                'color'     => 'success',
                'icon'      => 'ri-edit-2-line'
            ]);
            return redirect()->to('rusun/list');
        } else {
            //inisiasi flashdata jika data gagal disimpan
            session()->setFlashdata([
                'status'    => 'Failed',
                'message'   => 'Update Data Gagal',
                'color'     => 'danger',
                'icon'      => 'ri-error-warning-line'
            ]);
            //redirect ke halaman program list
            return redirect()->to('rusun/list');
        }
    }
    //update selected data
    public function update(): string
    {
        return view('\Modules\Aduan\Views\list');
    }
    //delete selected data
    public function delete($id)
    {
        //mengupdate data ke database dan mengirimkan statusnya
        if ($this->rusun->delete($id)) {
            //inisiasi flashdata jika data berhasil disimpan
            session()->setFlashdata([
                'status'    => 'Success',
                'message'   => 'Hapus Data Berhasil',
                'color'     => 'success',
                'icon'      => 'ri-delete-bin-2-line'
            ]);
            //redirect ke halaman program list
            return redirect()->to('rusun/list');
        } else {
            //inisiasi flashdata jika data gagal disimpan
            session()->setFlashdata([
                'status'    => 'Failed',
                'message'   => 'Hapus Data Gagal',
                'color'     => 'danger',
                'icon'      => 'ri-error-warning-line'
            ]);
            //redirect ke halaman program list
            return redirect()->to('rusun/list');
        }
    }

    private function generateThumbs($newName = null)
    {
        $image = \Config\Services::image('gd');
        $image->withFile('./uploads/rusun/' . $newName)
            ->resize(400, 180, true, 'width')
            ->save('./uploads/rusun/_small/' . $newName);
    }

    public function lantai($id = null)
    {
        $data['rusun'] = $this->rusun->where('rusun_id', $id)->first();
        $data['lantai'] = $this->lantai->getLantaiWithTotalKamar($id)->getResultArray();
        return view('rusun/lantai', $data);
    }

    public function lantaiDetail()
    {
        $id =  $this->request->getPost('id');
        $data = $this->lantai->where(['lantai_id' => $id])->first();
        return json_encode($data);
    }

    public function tambahLantai()
    {
        $rusun = $this->request->getPost('rusun');
        $kodeRusun = strval($this->request->getPost('kodeRusun'));
        $kodeLantai = strval($this->request->getPost('kodeBlok'));
        $data = [
            'lantai_nama'   => $this->request->getPost('namaLantai'),
            'lantai_kode'   => strtoupper($kodeRusun . '-' . $kodeLantai),
            'id_rusun'      => $this->request->getPost('rusun'),
        ];

        if ($this->lantai->save($data)) {
            //inisiasi flashdata jika data berhasil disimpan
            session()->setFlashdata([
                'status'    => 'Success',
                'message'   => 'Input Data Berhasil',
                'color'     => 'success',
                'icon'      => 'ri-edit-2-line'
            ]);
            return redirect()->to('rusun/lantai/' . $rusun);
        } else {
            //inisiasi flashdata jika data gagal disimpan
            session()->setFlashdata([
                'status'    => 'Failed',
                'message'   => 'Input Data Gagal',
                'color'     => 'danger',
                'icon'      => 'ri-error-warning-line'
            ]);
            //redirect ke halaman program list
            return redirect()->to('rusun/lantai/' . $rusun);
        }
    }

    public function updateLantai()
    {
        $rusun = $this->request->getPost('rusun');
        $lantai = $this->request->getPost('id_lantai');
        $data = [
            'lantai_id'   => $lantai,
            'lantai_nama'   => $this->request->getPost('namaLantai'),
        ];
        if ($this->lantai->save($data)) {
            //inisiasi flashdata jika data berhasil disimpan
            session()->setFlashdata([
                'status'    => 'Success',
                'message'   => 'Update Data Berhasil',
                'color'     => 'success',
                'icon'      => 'ri-edit-2-line'
            ]);
            return redirect()->to('rusun/lantai/' . $rusun);
        } else {
            //inisiasi flashdata jika data gagal disimpan
            session()->setFlashdata([
                'status'    => 'Failed',
                'message'   => 'Update Data Gagal',
                'color'     => 'danger',
                'icon'      => 'ri-error-warning-line'
            ]);
            //redirect ke halaman program list
            return redirect()->to('rusun/lantai/' . $rusun);
        }
    }

    public function deleteLantai($rusun, $id)
    {
        //mengupdate data ke database dan mengirimkan statusnya
        if ($this->lantai->delete($id)) {
            //inisiasi flashdata jika data berhasil disimpan
            session()->setFlashdata([
                'status'    => 'Success',
                'message'   => 'Hapus Data Berhasil',
                'color'     => 'success',
                'icon'      => 'ri-delete-bin-2-line'
            ]);
            //redirect ke halaman program list
            return redirect()->to('rusun/lantai/' . $rusun);
        } else {
            //inisiasi flashdata jika data gagal disimpan
            session()->setFlashdata([
                'status'    => 'Failed',
                'message'   => 'Hapus Data Gagal',
                'color'     => 'danger',
                'icon'      => 'ri-error-warning-line'
            ]);
            //redirect ke halaman program list
            return redirect()->to('rusun/lantai/' . $rusun);
        }
    }

    public function kamar($rusun = null, $lantai = null)
    {
        $data['rusun'] = $this->rusun->where('rusun_id', $rusun)->first();
        $data['lantai'] = $this->lantai->where('lantai_id', $lantai)->first();
        $data['kamar'] = $this->kamar->where('id_lantai', $lantai)->findAll();
        return view('rusun/kamar', $data);
    }

    public function tambahKamar()
    {
        $rusun = $this->request->getPost('rusun');
        $lantai = $this->request->getPost('lantai');
        $kodeLantai = strval($this->request->getPost('kodeLantai'));
        $nomorKamar = strval($this->request->getPost('nomorKamar'));
        $data = [
            'kamar_kode'    => strtoupper($kodeLantai . '-' . $nomorKamar),
            'kamar_nomor'   => $nomorKamar,
            'kamar_harga'   => $this->request->getPost('harga'),
            'id_lantai'     => $lantai,
        ];

        if ($this->kamar->save($data)) {
            //inisiasi flashdata jika data berhasil disimpan
            session()->setFlashdata([
                'status'    => 'Success',
                'message'   => 'Input Data Berhasil',
                'color'     => 'success',
                'icon'      => 'ri-edit-2-line'
            ]);
            return redirect()->to('rusun/kamar/' . $rusun . '/' . $lantai);
        } else {
            //inisiasi flashdata jika data gagal disimpan
            session()->setFlashdata([
                'status'    => 'Failed',
                'message'   => 'Input Data Gagal',
                'color'     => 'danger',
                'icon'      => 'ri-error-warning-line'
            ]);
            //redirect ke halaman program list
            return redirect()->to('rusun/kamar/' . $rusun . '/' . $lantai);
        }
    }

    public function kamarDetail()
    {
        $id =  $this->request->getPost('id');
        $data = $this->kamar->where(['kamar_id' => $id])->first();
        return json_encode($data);
    }

    public function updateKamar()
    {
        $rusun = $this->request->getPost('rusun');
        $lantai = $this->request->getPost('lantai');
        $kamar = $this->request->getPost('kamar');
        $data = [
            'kamar_id'   => $kamar,
            'kamar_harga'   => $this->request->getPost('harga'),
        ];
        if ($this->kamar->save($data)) {
            //inisiasi flashdata jika data berhasil disimpan
            session()->setFlashdata([
                'status'    => 'Success',
                'message'   => 'Update Data Berhasil',
                'color'     => 'success',
                'icon'      => 'ri-edit-2-line'
            ]);
            return redirect()->to('rusun/kamar/' . $rusun . '/' . $lantai);
        } else {
            //inisiasi flashdata jika data gagal disimpan
            session()->setFlashdata([
                'status'    => 'Failed',
                'message'   => 'Update Data Gagal',
                'color'     => 'danger',
                'icon'      => 'ri-error-warning-line'
            ]);
            //redirect ke halaman program list
            return redirect()->to('rusun/kamar/' . $rusun . '/' . $lantai);
        }
    }

    public function deleteKamar($rusun, $lantai, $id)
    {
        //mengupdate data ke database dan mengirimkan statusnya
        if ($this->kamar->delete($id)) {
            //inisiasi flashdata jika data berhasil disimpan
            session()->setFlashdata([
                'status'    => 'Success',
                'message'   => 'Hapus Data Berhasil',
                'color'     => 'success',
                'icon'      => 'ri-delete-bin-2-line'
            ]);
            //redirect ke halaman program list
            return redirect()->to('rusun/kamar/' . $rusun . '/' . $lantai);
        } else {
            //inisiasi flashdata jika data gagal disimpan
            session()->setFlashdata([
                'status'    => 'Failed',
                'message'   => 'Hapus Data Gagal',
                'color'     => 'danger',
                'icon'      => 'ri-error-warning-line'
            ]);
            //redirect ke halaman program list
            return redirect()->to('rusun/kamar/' . $rusun . '/' . $lantai);
        }
    }
    public function datalantai()
    {
        $parent =  $this->request->getPost('parent');
        $data = $this->lantai->where(['id_rusun' => $parent])->orderBy('lantai_id', 'asc')->findAll();
        return json_encode($data);
    }
    public function datakamar()
    {
        $parent =  $this->request->getPost('parent');
        $data = $this->kamar->where(['id_lantai' => $parent])->orderBy('kamar_id', 'asc')->findAll();
        return json_encode($data);
    }
}
