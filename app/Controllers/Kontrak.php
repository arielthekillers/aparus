<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Kontrak_model;
use App\Models\Penghuni_model;
use App\Models\Rusun_model;
use App\Models\Dokumen_model;
use App\Models\Kelurahan_model;
use App\Models\Kecamatan_model;
use App\Models\Anggotakeluarga_model;

class Kontrak extends BaseController
{
    protected $kontrak;
    protected $penghuni;
    protected $dokumen;
    protected $rusun;
    protected $kecamatan;
    protected $kelurahan;
    protected $anggota_keluarga;
    protected $kontak;

    public function __construct()
    {
        helper(['rupiah', 'bulan', 'tgl_indo', 'form', 'kontrak', 'custom', 'dokumen', 'fixphonenumber', 'timestamp', 'ruangWa']);
        $this->kontrak = new Kontrak_model();
        $this->penghuni = new Penghuni_model();
        $this->dokumen = new Dokumen_model();
        $this->rusun = new Rusun_model();
        $this->kecamatan = new Kecamatan_model();
        $this->kelurahan = new Kelurahan_model();
        $this->anggota_keluarga = new Anggotakeluarga_model();
    }

    public function index()
    {
        echo "Page Not Found";
    }
    //halaman permohonan - User
    public function permohonan()
    {
        $kode = session('userid');
        $data["penghuni"] = $this->penghuni->where('kode_penghuni', $kode)->first();
        if ($data['penghuni']) {
            $data['kelurahan'] = $this->kelurahan->where('id_kelurahan', $data['penghuni']['kelurahan'])->first();
            $data['kecamatan'] = $this->kecamatan->where('id_kecamatan', $data['penghuni']['kecamatan'])->first();
            $data['rusun'] = $this->rusun->where('rusun_id', $data['penghuni']['rusuntujuan'])->first();
            $data["dokumen"] = $this->dokumen->where(['kode_penghuni' => $data['penghuni']['kode_penghuni']])->orderBy('namadokumen', 'DESC')->findAll();
            $data["anggotakeluarga"] = $this->anggota_keluarga->where(['kode_penghuni' => $data['penghuni']['kode_penghuni']])->orderBy('tanggal_lahir', 'ASC')->findAll();
            $data["permohonan"] = $this->kontrak->where(['penghuni' => $data['penghuni']['kode_penghuni']])->first();
        }
        echo view('kontrak/permohonan', $data);
    }
    //halaman permohonan masuk - Admin
    public function permohonanMasuk()
    {
        $data["kontrak"] = $this->kontrak->getKontrakWithPenghuni('Permohonan', null)->getResultArray();
        return view('kontrak/permohonan-masuk', $data);
    }
    //halaman detail permohonan - Admin
    public function detailPemohon($kode = null)
    {
        $data["penghuni"] = $this->penghuni->where('kode_penghuni', $kode)->first();
        if ($data['penghuni']) {
            $data['kelurahan'] = $this->kelurahan->where('id_kelurahan', $data['penghuni']['kelurahan'])->first();
            $data['kecamatan'] = $this->kecamatan->where('id_kecamatan', $data['penghuni']['kecamatan'])->first();
            $data['rusun'] = $this->rusun->where('rusun_id', $data['penghuni']['rusuntujuan'])->first();
            $data["dokumen"] = $this->dokumen->where(['kode_penghuni' => $data['penghuni']['kode_penghuni']])->orderBy('namadokumen', 'DESC')->findAll();
            $data["anggotakeluarga"] = $this->anggota_keluarga->where(['kode_penghuni' => $data['penghuni']['kode_penghuni']])->orderBy('tanggal_lahir', 'ASC')->findAll();
            $data["permohonan"] = $this->kontrak->where(['penghuni' => $data['penghuni']['kode_penghuni']])->first();
        }
        echo view('kontrak/detailPemohon', $data);
    }
    //proses kirim permohonan - User
    public function kirimpermohonan()
    {
        if ($this->request->getPost('kode_penghuni')) {
            $data = [
                'penghuni'  => $this->request->getPost('kode_penghuni'),
                'status_kontrak'  => 'Permohonan',
            ];
            if ($this->kontrak->save($data)) {
                $penghuni = $this->penghuni->getKontak($this->request->getPost('kode_penghuni'))->getRow();
                send_message($penghuni->kontak, 'Terima Kasih, Permohonan anda telah terkirim. Tim kami akan melakukan verifikasi data dan menghubungi anda segera. *Admin Aparus*');
                //inisiasi flashdata jika data berhasil disimpan
                session()->setFlashdata([
                    'status'    => 'Success',
                    'message'   => 'Data Berhasil Disimpan',
                    'color'     => 'success',
                    'icon'      => 'ri-edit-2-line'
                ]);
                return redirect()->to('kontrak/permohonan');
            } else {
                //inisiasi flashdata jika data gagal disimpan
                session()->setFlashdata([
                    'status'    => 'Failed',
                    'message'   => 'Data Gagal Disimpan',
                    'color'     => 'danger',
                    'icon'      => 'ri-error-warning-line'
                ]);
                //redirect ke halaman program list
                return redirect()->to('kontrak/permohonan');
            }
        }
    }
    //Update Status Permohonan ke Daftar Tunggu - Admin
    public function updateToDaftarTunggu($kontrak = null, $kode = null)
    {
        if (!empty($kontrak)) {
            $data = [
                'kontrak_id'  => $kontrak,
                'status_kontrak'  => 'Daftar Tunggu',
            ];
            if ($this->kontrak->save($data)) {
                $penghuni = $this->penghuni->getKontak($kode)->getRow();
                send_message($penghuni->kontak, 'Terima Kasih, Permohonan anda telah diterima. Status permohanan masuk ke Daftar Tunggu. *Admin Aparus*');
                //inisiasi flashdata jika data berhasil disimpan
                session()->setFlashdata([
                    'status'    => 'Success',
                    'message'   => 'Data Berhasil Disimpan ke Daftar Tunggu',
                    'color'     => 'success',
                    'icon'      => 'ri-edit-2-line'
                ]);
                return redirect()->to('kontrak/permohonanMasuk');
            } else {
                //inisiasi flashdata jika data gagal disimpan
                session()->setFlashdata([
                    'status'    => 'Failed',
                    'message'   => 'Data Gagal Disimpan ke Daftar Tunggu',
                    'color'     => 'danger',
                    'icon'      => 'ri-error-warning-line'
                ]);
                //redirect ke halaman program list
                return redirect()->to('kontrak/permohonanMasuk');
            }
        }
    }
    //halaman daftar tunggu - Admin
    public function daftarTunggu($rusun = null)
    {
        $data["daftarrusun"] = $this->rusun->findAll();
        $data["rusun"] = $this->rusun->where('rusun_id', $rusun)->first();
        $data["kontrak"] = $this->kontrak->getKontrakWithPenghuni('Daftar Tunggu', $rusun)->getResultArray();
        return view('kontrak/daftartunggu', $data);
    }
    //halaman form kontrak - Admin
    public function tambah($kode = null)
    {
        //$data['penghuni'] = $this->penghuni->where('kode_penghuni', $penghuni)->first();
        $data['penghuni'] = $this->penghuni->getDetailPenghuniWithRusun($kode)->getRowArray();
        $data["permohonan"] = $this->kontrak->where(['penghuni' => $kode])->first();
        $data['rusun'] = $this->rusun->findAll();
        return view('kontrak/tambah', $data);
    }
    //proses simpan kontrak dari form - Admin
    public function save()
    {
        $data = [
            'kontrak_id'  => $this->request->getPost('kontrak_id'),
            'status_kontrak'  => 'Terkontrak',
            'nomor_kontrak'  => $this->request->getPost('nomor_kontrak'),
            'kamar'  => $this->request->getPost('kamar'),
            'tgl_awal_kontrak'  => $this->request->getPost('tgl_mulai'),
            'tgl_akhir_kontrak'  => $this->request->getPost('tgl_akhir')
        ];
        if ($this->kontrak->save($data)) {
            //inisiasi flashdata jika data berhasil disimpan
            session()->setFlashdata([
                'status'    => 'Success',
                'message'   => 'Data Berhasil Disimpan',
                'color'     => 'success',
                'icon'      => 'ri-edit-2-line'
            ]);
            return redirect()->to('kontrak/daftarTunggu');
        } else {
            //inisiasi flashdata jika data gagal disimpan
            session()->setFlashdata([
                'status'    => 'Failed',
                'message'   => 'Data Gagal Disimpan',
                'color'     => 'danger',
                'icon'      => 'ri-error-warning-line'
            ]);
            //redirect ke halaman program list
            return redirect()->to('kontrak/daftarTunggu');
        }
    }
    //halaman penghuni terkontrak - Admin
    public function list($rusun = null)
    {
        $data["daftarrusun"] = $this->rusun->findAll();
        $data["rusun"] = $this->rusun->where('rusun_id', $rusun)->first();
        $data["kontrak"] = $this->kontrak->getKontrakWithPenghuniAndKamar('Terkontrak', $rusun)->getResultArray();
        return view('kontrak/terkontrak', $data);
    }





















    public function edit($id = null)
    {
        $data['pejabat'] = $this->kontrak->where('id_pejabat', $id)->first();
        echo view('Pejabat/edit', $data);
    }

    public function delete($id = null)
    {
        if ($this->kontrak->delete($id)) {
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
