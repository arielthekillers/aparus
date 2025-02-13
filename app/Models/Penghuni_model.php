<?php

namespace App\Models;

use CodeIgniter\Model;

class Penghuni_model extends Model
{
    protected $table      = 'penghuni';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id_penghuni';
    protected $allowedFields = [
        'ktp',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'kecamatan',
        'kelurahan',
        'alamat',
        'jeniskelamin',
        'pekerjaan',
        'agama',
        'statusmenikah',
        'jumlahanggotakeluarga',
        'statusdifabel',
        'kontak',
        'email',
        'user_id',
        'status',
        'kode_penghuni',
        'rusuntujuan',
        'password',
        'avatar',
        'created_by',
        'created_at',
        'updated_at'
    ];

    public function getPenghuniWithRusun($rusun = null)
    {
        $this->builder()
            ->select('*, penghuni.created_at as waktudaftar, penghuni.status as statuspendaftaran, penghuni.created_at as tgl_daftar')
            ->join('master_rusun', 'rusun_id = rusuntujuan', 'LEFT')
            ->join('user', 'user.user_id = penghuni.created_by', 'LEFT')
            ->join('kontrak', 'kontrak.penghuni = penghuni.kode_penghuni', 'LEFT')
            ->orderBy('waktudaftar', 'DESC');
        return $this->paginate(20, 'penghuni');
    }
    public function getPenghuniWithRusunAndSearch($keyword)
    {
        $this->builder()
            ->select('*, penghuni.created_at as waktudaftar, penghuni.status as statuspendaftaran, penghuni.created_at as tgl_daftar')
            ->join('master_rusun', 'rusun_id = rusuntujuan', 'LEFT')
            ->join('user', 'user.user_id = penghuni.created_by', 'LEFT')
            ->join('kontrak', 'kontrak.penghuni = penghuni.kode_penghuni', 'LEFT')
            ->like('nama', $keyword)
            ->orLike('ktp', $keyword)
            ->orderBy('waktudaftar', 'DESC');
        return $this->paginate(20, 'penghuni');
    }
    public function getDetailPenghuniWithRusun($kode = null)
    {
        $builder = $this->db->table('penghuni');
        $builder->select('*, penghuni.created_at as waktudaftar, penghuni.status as statuspendaftaran');
        $builder->join('master_rusun', 'rusun_id = rusuntujuan', 'LEFT');
        $builder->where('kode_penghuni', $kode);
        return $builder->get();
    }
    public function checkPenghuniEksist($phone, $nik)
    {
        $builder = $this->db->table('penghuni');
        $builder->select('kontak,ktp');
        $builder->where('kontak', $phone);
        $builder->orWhere('ktp', $nik);
        return $builder->get();
    }
    public function checkPhoneEksist($phone)
    {
        $builder = $this->db->table('penghuni');
        $builder->select('kontak,ktp');
        $builder->where('kontak', $phone);
        return $builder->get();
    }
    public function getDetailPenghuniWithKelKec($kode = null)
    {
        $builder = $this->db->table('penghuni');
        $builder->select('*');
        $builder->join('master_kelurahan', 'kelurahan = master_kelurahan.id_kelurahan', 'LEFT');
        $builder->join('master_kecamatan', 'kecamatan = master_kecamatan.id_kecamatan', 'LEFT');
        $builder->where('kode_penghuni', $kode);
        return $builder->get();
    }
    public function getKontak($kode)
    {
        $builder = $this->db->table('penghuni');
        $builder->select('kontak');
        $builder->where('kode_penghuni', $kode);
        return $builder->get();
    }
}
