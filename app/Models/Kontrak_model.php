<?php

namespace App\Models;


use CodeIgniter\Model;

class Kontrak_model extends Model
{
    protected $table      = 'kontrak';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'kontrak_id';
    protected $allowedFields = ['status_kontrak', 'nomor_kontrak', 'penghuni', 'kamar', 'tgl_awal_kontrak', 'tgl_akhir_kontrak'];

    public function getKontrakWithPenghuni($status, $rusun)
    {
        $builder = $this->db->table('kontrak');
        $builder->select('*,kontrak.created_at as waktudaftar');
        $builder->join('penghuni', 'kode_penghuni = penghuni', 'LEFT');
        $builder->join('master_rusun', 'rusuntujuan = rusun_id', 'LEFT');
        $builder->where('status_kontrak', $status);
        if (isset($rusun)) {
            $builder->where('rusun_id', $rusun);
        }
        $builder->orderBy('waktudaftar', 'ASC');
        return $builder->get();
    }
    public function getKontrakWithPenghuniAndKamar($status, $rusun)
    {
        $builder = $this->db->table('kontrak');
        $builder->select('*,kontrak.created_at as waktudaftar');
        $builder->join('penghuni', 'kode_penghuni = penghuni', 'LEFT');
        $builder->join('master_rusun', 'rusuntujuan = rusun_id', 'LEFT');
        $builder->join('master_kamar', 'kamar = kamar_id', 'LEFT');
        $builder->where('status_kontrak', $status);
        if (isset($rusun)) {
            $builder->where('rusun_id', $rusun);
        }
        $builder->orderBy('waktudaftar', 'ASC');
        return $builder->get();
    }
    public function getSearchKontrakWithPenghuniAndKamar($keyword)
    {
        $builder = $this->db->table('kontrak');
        $builder->select('*,kontrak.created_at as waktudaftar');
        $builder->join('penghuni', 'kode_penghuni = penghuni', 'LEFT');
        $builder->join('master_kamar', 'kamar = kamar_id', 'LEFT');
        $builder->where('status_kontrak', 'terkontrak');
        $builder->orderBy('nama', 'ASC');
        $builder->like('nama', $keyword);
        $builder->orLike('ktp', $keyword);
        $builder->orLike('kamar_kode', $keyword);
        return $builder->get();
    }
}
