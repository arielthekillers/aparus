<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kontrak_model;
use App\Models\Penghuni_model;
use App\Models\Dokumen_model;
use App\Models\Rusun_model;
use App\Models\Kelurahan_model;
use App\Models\Kecamatan_model;
use App\Models\Anggotakeluarga_model;
use App\Models\Kamar_model;
use App\Models\TagihanKamar_model;
use App\Models\Invoice_model;
use App\Models\InvoiceDetails_model;
use App\Models\Vatoken_model;

class Penghuni extends BaseController
{
    protected $penghuni;
    protected $dokumen;
    protected $rusun;
    protected $kecamatan;
    protected $kelurahan;
    protected $anggota_keluarga;
    protected $kontrak;
    protected $kamar;
    protected $invoice;
    protected $tagihan;
    protected $invoiceDetails;
    protected $vatoken;

    public function __construct() //konstruktor
    {
        helper(['url', 'rupiah', 'bulan', 'tgl_indo', 'form', 'fixphonenumber', 'dokumen', 'download', 'custom', 'va2_bankkaltimtara']);
        //memanggil dan menginstansiasi model program
        $this->penghuni = new Penghuni_model();
        $this->dokumen = new Dokumen_model();
        $this->rusun = new Rusun_model();
        $this->kecamatan = new Kecamatan_model();
        $this->kelurahan = new Kelurahan_model();
        $this->anggota_keluarga = new Anggotakeluarga_model();
        $this->invoiceDetails = new InvoiceDetails_model();
        $this->vatoken = new Vatoken_model();
    }

    //persiapan dihapus
    public function daftar()
    {

        $data["penghuni"] = $this->penghuni->where('user_id', session('userid'))->first();
        $data['rusun'] = $this->rusun->findAll();
        if ($data['penghuni']) {
            $data["dokumen"] = $this->dokumen->where(['kode_penghuni' => $data['penghuni']['id_penghuni']])->orderBy('namadokumen', 'DESC')->findAll();
        }
        return view('penghuni/daftar', $data);
    }

    public function edit($kode)
    {
        $data['kecamatan'] = $this->kecamatan->findAll();
        $data['kelurahan'] = $this->kelurahan->findAll();
        $data["penghuni"] = $this->penghuni->where('kode_penghuni', $kode)->first();
        // $data['namakec'] = $this->kecamatan->where(['id_kecamatan' => $data['penghuni']['kecamatan']])->first();
        // $data['namakel'] = $this->kelurahan->where(['id_kelurahan' => $data['penghuni']['kelurahan']])->first();
        $data['rusun'] = $this->rusun->findAll();
        if ($data['penghuni']) {
            $data["dokumen"] = $this->dokumen->where(['id_penghuni' => $data['penghuni']['id_penghuni']])->orderBy('namadokumen', 'DESC')->findAll();
        }

        return view('penghuni/edit', $data);
    }

    public function verifikasi($kode)
    {
        $data["penghuni"] = $this->penghuni->where('kode_penghuni', $kode)->first();
        $data['rusun'] = $this->rusun->findAll();
        if ($data['penghuni']) {
            $data["dokumen"] = $this->dokumen->where(['id_penghuni' => $data['penghuni']['id_penghuni']])->orderBy('namadokumen', 'DESC')->findAll();
        }
        return view('penghuni/verifikasi', $data);
    }

    public function save()
    {
        $kode_penghuni = substr(md5(microtime()), rand(0, 26), 10);
        $data = [

            'ktp'                       => $this->request->getPost('ktp'),
            'nama'                      => $this->request->getPost('nama'),
            'tempat_lahir'              => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir'             => $this->request->getPost('tanggal_lahir'),
            'jeniskelamin'              => $this->request->getPost('jeniskelamin'),
            'pekerjaan'                 => $this->request->getPost('pekerjaan'),
            'agama'                     => $this->request->getPost('agama'),
            'alamat'                    => $this->request->getPost('alamat'),
            'kecamatan'                 => $this->request->getPost('kecamatan'),
            'kelurahan'                 => $this->request->getPost('kelurahan'),
            'statusmenikah'             => $this->request->getPost('statusmenikah'),
            //'jumlahanggotakeluarga'     => $this->request->getPost('jumlahanggotakeluarga'),
            'statusdifabel'             => $this->request->getPost('statusdifabel'),
            'kontak'                    => $this->request->getPost('kontak'),
            'email'                     => $this->request->getPost('email'),
            'user_id'                   => $kode_penghuni,
            'kode_penghuni'             => $kode_penghuni,
            'rusuntujuan'               => $this->request->getPost('rusuntujuan'),
            'created_by'               => session('userid'),
        ];

        if ($this->request->getPost('id_penghuni')) {
            $data += [
                'id_penghuni'      => $this->request->getPost('id_penghuni')
            ];
        }

        if ($this->penghuni->save($data)) {
            //inisiasi flashdata jika data berhasil disimpan
            session()->setFlashdata([
                'status'    => 'Success',
                'message'   => 'Input Data Berhasil',
                'color'     => 'success',
                'icon'      => 'ri-edit-2-line'
            ]);
            return redirect()->to('penghuni/list/');
        } else {
            //inisiasi flashdata jika data gagal disimpan
            session()->setFlashdata([
                'status'    => 'Failed',
                'message'   => 'Input Data Gagal',
                'color'     => 'danger',
                'icon'      => 'ri-error-warning-line'
            ]);
            //redirect ke halaman program list
            return redirect()->to('penghuni/list/');
        }
    }

    public function saveByUser()
    {
        $kode_penghuni = session('userid');
        $data = [
            'id_penghuni'               => $this->request->getPost('id_penghuni'),
            'ktp'                       => $this->request->getPost('ktp'),
            'nama'                      => $this->request->getPost('nama'),
            'tempat_lahir'              => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir'             => $this->request->getPost('tanggal_lahir'),
            'jeniskelamin'              => $this->request->getPost('jeniskelamin'),
            'pekerjaan'                 => $this->request->getPost('pekerjaan'),
            'agama'                     => $this->request->getPost('agama'),
            'alamat'                    => $this->request->getPost('alamat'),
            'kecamatan'                 => $this->request->getPost('kecamatan'),
            'kelurahan'                 => $this->request->getPost('kelurahan'),
            'statusmenikah'             => $this->request->getPost('statusmenikah'),
            'jumlahanggotakeluarga'     => $this->request->getPost('jumlahanggotakeluarga'),
            'statusdifabel'             => $this->request->getPost('statusdifabel'),
            'kontak'                    => $this->request->getPost('kontak'),
            'email'                     => $this->request->getPost('email'),
            'user_id'                   => session('userid'),
            'rusuntujuan'               => $this->request->getPost('rusuntujuan'),
        ];


        if ($this->penghuni->save($data)) {
            //inisiasi flashdata jika data berhasil disimpan
            session()->setFlashdata([
                'status'    => 'Success',
                'message'   => 'Update Data Berhasil',
                'color'     => 'success',
                'icon'      => 'ri-edit-2-line'
            ]);
            return redirect()->to('penghuni/detail/' . $kode_penghuni);
        } else {
            //inisiasi flashdata jika data gagal disimpan
            session()->setFlashdata([
                'status'    => 'Failed',
                'message'   => 'Update Data Gagal',
                'color'     => 'danger',
                'icon'      => 'ri-error-warning-line'
            ]);
            //redirect ke halaman program list
            return redirect()->to('penghuni/detail/' . $kode_penghuni);
        }
    }

    public function verif()
    {
        $data = [
            'id_penghuni'               => $this->request->getPost('id_penghuni'),
            'status'                       => $this->request->getPost('status'),
        ];


        if ($this->penghuni->save($data)) {
            //inisiasi flashdata jika data berhasil disimpan
            session()->setFlashdata([
                'status'    => 'Success',
                'message'   => 'Data Berhasil Dikirim',
                'color'     => 'success',
                'icon'      => 'ri-edit-2-line'
            ]);
            return redirect()->to('kontrak/kontrak');
        } else {
            //inisiasi flashdata jika data gagal disimpan
            session()->setFlashdata([
                'status'    => 'Failed',
                'message'   => 'Input Data Gagal',
                'color'     => 'danger',
                'icon'      => 'ri-error-warning-line'
            ]);
            //redirect ke halaman program list
            return redirect()->to('kontrak/kontrak');
        }
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


    public function baru()
    {
        $data['kecamatan'] = $this->kecamatan->findAll();
        $data['kelurahan'] = $this->kelurahan->findAll();
        $data['rusun'] = $this->rusun->findAll();
        return view('penghuni/tambah', $data);
    }

    public function delete($id)
    {
        $this->penghuni->delete($id);
        $data['penghuni'] = $this->penghuni->findAll();
        return view('kontrak/list', $data);
    }

    public function datakelurahan()
    {
        $parent =  $this->request->getPost('parent');
        $data = $this->kelurahan->where(['id_kecamatan' => $parent])->orderBy('id_kecamatan', 'asc')->findAll();
        return json_encode($data);
    }
    //penghuni detail - user dan admin
    public function detail($kode = null)
    {
        $data['kecamatan'] = $this->kecamatan->findAll();
        $data['kelurahan'] = $this->kelurahan->findAll();
        $data["penghuni"] = $this->penghuni->where('kode_penghuni', $kode)->first();
        $data['rusun'] = $this->rusun->findAll();
        $data['kode'] = $kode;
        $this->kontrak = new Kontrak_model();
        $data['kontrak'] = $this->kontrak->where(['penghuni' => $kode])->first();
        return view('penghuni/detail', $data);
    }
    //penghuni dokumen - user dan admin
    public function dokumen($kode = null)
    {
        $data["dokumen"] = $this->dokumen->where(['kode_penghuni' => $kode])->orderBy('namadokumen', 'DESC')->findAll();
        $data['kode'] = $kode;
        return view('penghuni/dokumen', $data);
    }
    //penghuni anggota keluarga - user dan admin
    public function anggotaKeluarga($kode = null)
    {
        $data["anggotakeluarga"] = $this->anggota_keluarga->where(['kode_penghuni' => $kode])->orderBy('tanggal_lahir', 'ASC')->findAll();
        $data['kode'] = $kode;
        return view('penghuni/anggotakeluarga', $data);
    }
    //penghuni kontrak - user dan admin
    public function kontrak($kode = null)
    {
        $this->kamar = new Kamar_model();
        $this->kontrak = new Kontrak_model();
        $data["kontrak"] = $this->kontrak->where(['penghuni' => $kode])->first();
        $data['kode'] = $kode;
        $data['kamar'] = $this->kamar->where('kamar_id', $data['kontrak']['kamar'])->first();
        return view('penghuni/kontrak', $data);
    }
    //penghuni Tagihan Kamar - user dan admin
    public function Tagihan($kode = null)
    {
        $this->kontrak = new Kontrak_model();
        $this->tagihan = new TagihanKamar_model();
        $data["kontrak"] = $this->kontrak->where(['penghuni' => $kode])->first();
        $data['kode'] = $kode;
        $data['tagihan'] = $this->tagihan->where('tagihan_kontrak', $data['kontrak']['kontrak_id'])->findAll();
        return view('penghuni/tagihan', $data);
    }
    //penghuni invoice - user dan admin
    public function invoice($kode = null)
    {
        $this->kontrak = new Kontrak_model();
        $this->invoice = new Invoice_model();
        $data["kontrak"] = $this->kontrak->where(['penghuni' => $kode])->first();
        $data['kode'] = $kode;
        $data['invoice'] = $this->invoice->where('inv_kontrak', $data['kontrak']['kontrak_id'])->findAll();
        return view('penghuni/invoice', $data);
    }
    //penghuni invoice - user dan admin
    public function invoiceDetail($inv, $kode)
    {
        $this->kontrak = new Kontrak_model();
        $this->invoice = new Invoice_model();
        $data["kontrak"] = $this->kontrak->where(['penghuni' => $kode])->first();
        $data["penghuni"] = $this->penghuni->where(['kode_penghuni' => $kode])->first();
        $data['kode'] = $kode;
        $data['invoice'] = $this->invoice->where('inv_nomor', $inv)->first();
        $data['invoiceDetail'] = $this->invoiceDetails->getInvoiceDetailItem($data['invoice']['inv_nomor'])->getResultArray();
        //cek apakah ada nomor invoice
        if (empty($data['invoice']['inv_payment_va'])) {
            date_default_timezone_set('Asia/Makassar');
            //initiating variable
            $name   = $data["penghuni"]['nama'];
            $number = '0315' . $data['invoice']['inv_nomor'];
            $amount = $data['invoice']['inv_total'];
            $description = 'No. Inv. ' . $data['invoice']['inv_nomor'];
            //get token
            $getTokenFromDatabase = $this->vatoken->orderBy('token_id', 'DESC')->first();
            //jika ada token di database
            if ($getTokenFromDatabase) {
                //jika ada token tapi expired
                if (strtotime($getTokenFromDatabase['token_datetime']) < strtotime('-1 day')) {
                    $newToken = generateToken();
                    //simpan ke database
                    if ($newToken) {
                        $tokendata = [
                            'token_data'    => $newToken,
                        ];
                        if ($this->vatoken->save($tokendata)) {
                            $token = $newToken;
                        }
                    }
                }
                //jika ada token dan belum expired
                else {
                    $token = $getTokenFromDatabase['token_data'];
                }
            }
            //jika tidak ada token di database
            else {
                $newToken = generateToken();
                if ($newToken) {
                    $tokendata = [
                        'token_data'    => $newToken,
                    ];
                    if ($this->vatoken->save($tokendata)) {
                        $token = $newToken;
                    }
                }
            }
            //generate virtual account
            $generatedVirtualAccount = generateVirtualAccount($token, $number, $name, $amount, $description);
            if ($generatedVirtualAccount == '00') {
                $vadata = [
                    'inv_id'                => $data['invoice']['inv_id'],
                    'inv_payment_method'    => 'Virtual Account',
                    'inv_payment_va'        => $number,
                ];
                $this->invoice->save($vadata);
                $data['invoice']['inv_payment_va'] = $number;
            } else {
                $data['invoice']['inv_payment_va'] = "gagal generate va";
            }
        }
        return view('penghuni/invoicedetail', $data);
    }
    public function savedatakeluarga()
    {
        $data = [
            'kode_penghuni'                => $this->request->getPost('kode_penghuni'),
            'nama'                         => $this->request->getPost('nama'),
            'jenis_kelamin'                => $this->request->getPost('jenis_kelamin'),
            'status'                       => $this->request->getPost('status'),
            'pendidikan'                   => $this->request->getPost('pendidikan'),
            'pendapatan'                   => $this->request->getPost('pendapatan'),
            'tanggal_lahir'                 => $this->request->getPost('tanggal_lahir'),
        ];
        if ($this->request->getPost('id_anggotakeluarga')) {
            $data += [
                'id_anggotakeluarga'      => $this->request->getPost('id_anggotakeluarga'),
            ];
        }
        if ($this->anggota_keluarga->save($data)) {
            //inisiasi flashdata jika data berhasil disimpan
            session()->setFlashdata([
                'status'    => 'Success',
                'message'   => 'Input Data Berhasil',
                'color'     => 'success',
                'icon'      => 'ri-edit-2-line'
            ]);
            return redirect()->to('penghuni/anggotakeluarga/' . $this->request->getPost('kode_penghuni'));
        } else {
            //inisiasi flashdata jika data gagal disimpan
            session()->setFlashdata([
                'status'    => 'Failed',
                'message'   => 'Input Data Gagal',
                'color'     => 'danger',
                'icon'      => 'ri-error-warning-line'
            ]);
            //redirect ke halaman program list
            return redirect()->to('penghuni/anggotakeluarga/' . $this->request->getPost('kode_penghuni'));
        }
    }
    public function deleteanggotakeluarga($id = null, $kode = null)
    {
        if ($this->anggota_keluarga->delete($id)) {
            //inisiasi flashdata jika data berhasil disimpan
            session()->setFlashdata([
                'status'    => 'Success',
                'message'   => 'Hapus Data Berhasil',
                'color'     => 'success',
                'icon'      => 'ri-delete-bin-3-line'
            ]);
            return redirect()->to('penghuni/anggotakeluarga/' . $kode);
        } else {
            //inisiasi flashdata jika data gagal disimpan
            session()->setFlashdata([
                'status'    => 'Failed',
                'message'   => 'Hapus Data Gagal',
                'color'     => 'danger',
                'icon'      => 'ri-error-warning-line'
            ]);
            //redirect ke halaman program list
            return redirect()->to('penghuni/anggotakeluarga/' . $kode);
        }
    }
    public function detailAnggotakeluarga()
    {
        $id =  $this->request->getPost('id');
        $data = $this->anggota_keluarga->where(['id_anggotakeluarga' => $id])->first();
        return json_encode($data);
    }
    public function uploadDokumen()
    {
        if ($this->request->getFile('dokumen')) {
            $validationRule = [
                'dokumen' => [
                    'label' => 'Dokumen',
                    'rules' => 'uploaded[dokumen]' . '|mime_in[dokumen,image/jpg,image/JPG,image/jpeg,image/gif,image/png,image/webp,application/pdf,application/x-download,application/zip,application/x-rar-compressed,application/msword,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet]' . '|max_size[dokumen,5120]',
                ],
            ];

            if (!$this->validate($validationRule)) {
                //$message = $this->validator->getErrors();
                session()->setFlashdata([
                    'status'    => 'Failed',
                    'message'   => 'Upload Dokumen Gagal. Ekstensi File tidak diperbolehkan atau ukuran file terlalu besar.',
                    'color'     => 'danger',
                    'icon'      => 'ri-error-warning-line'
                ]);
                //redirect ke halaman program list
                return redirect()->to('penghuni/dokumen/' . $this->request->getPost('kode_penghuni'));
            } else {
                $dokumen = $this->request->getFile('dokumen');
                $newName = $dokumen->getRandomName();
                $dokumen->move('./uploads/dokumen/', $newName);

                $data = [
                    'kode_penghuni'    => $this->request->getPost('kode_penghuni'),
                    'namadokumen' => $this->request->getPost('namadokumen'),
                    'dokumen'  => $newName,
                ];
                if ($this->dokumen->save($data)) {
                    //inisiasi flashdata jika data berhasil disimpan
                    session()->setFlashdata([
                        'status'    => 'Success',
                        'message'   => 'Upload Dokumen Berhasil',
                        'color'     => 'success',
                        'icon'      => 'ri-edit-2-line'
                    ]);
                    //redirect ke halaman program list
                    return redirect()->to('penghuni/dokumen/' . $this->request->getPost('kode_penghuni'));
                } else {
                    //inisiasi flashdata jika data gagal disimpan
                    session()->setFlashdata([
                        'status'    => 'Failed',
                        'message'   => 'Upload Dokumen Gagal',
                        'color'     => 'danger',
                        'icon'      => 'ri-error-warning-line'
                    ]);
                    //redirect ke halaman program list
                    return redirect()->to('penghuni/dokumen/' . $this->request->getPost('kode_penghuni'));
                }
            }
        }
    }

    public function deleteDokumen($id = null)
    {
        $file = $this->dokumen->where('id_dokumen', $id)->first();
        $filelocation = 'uploads/dokumen/' . $file['dokumen'];
        if (file_exists($filelocation)) {
            unlink(FCPATH . "uploads/dokumen/" . $file['dokumen']);
        }
        if ($this->dokumen->delete($id)) {
            //inisiasi flashdata jika data berhasil disimpan
            session()->setFlashdata([
                'status'    => 'Success',
                'message'   => 'Delete Dokumen Berhasil',
                'color'     => 'success',
                'icon'      => 'ri-edit-2-line'
            ]);
            //redirect ke halaman program list
            return redirect()->to('penghuni/dokumen/' . $file['kode_penghuni']);
        } else {
            //inisiasi flashdata jika data gagal disimpan
            session()->setFlashdata([
                'status'    => 'Failed',
                'message'   => 'Delete Dokumen Gagal',
                'color'     => 'danger',
                'icon'      => 'ri-error-warning-line'
            ]);
            //redirect ke halaman program list
            return redirect()->to('penghuni/dokumen/' . $file['kode_penghuni']);
        }
    }
}
