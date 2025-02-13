<?php

namespace App\Models;

use CodeIgniter\Model;

class Aduan_model extends Model
{
    protected $table      = 'aduan';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id_aduan';
    protected $allowedFields = ['judul', 'deskripsi', 'pengadu', 'status', 'hinian', 'teknisi', 'created_at', 'updated_at'];

    public function getAduanWithUser($status)
    {
        $builder = $this->db->table('aduan');
        $builder->select('judul, deskripsi, pengadu,hunian,teknisi,ktp,nama,kode_penghuni,kontak, aduan.created_at as tgladuan');
        $builder->join('penghuni', 'kode_penghuni = pengadu', 'LEFT');
        if ($status !== 'Semua') {
            $builder->where('aduan.status', $status);
        }
        if (session('usertype') == 'penghuni') {
            $builder->where('aduan.pengadu', session('userid'));
        }
        $builder->orderBy('tgladuan', 'DESC');
        return $builder->get();
    }

    public function countAduan()
    {
        $builder = $this->db->table('aduan');
        $builder->select('status,count(status) as jumlahperstatus');
        if (session('usertype') == 'penghuni') {
            $builder->where('aduan.pengadu', session('userid'));
        }
        $builder->groupBy('status');
        $builder->orderBy('status', 'DESC');
        return $builder->get();
    }
    public function countAllAduan()
    {
        $builder = $this->db->table('aduan');
        $builder->select('status,count(status) as jumlah');
        if (session('usertype') == 'penghuni') {
            $builder->where('aduan.pengadu', session('userid'));
        }
        return $builder->countAllResults();
    }

    public function getAduanWithUserToday()
    {
        $builder = $this->db->query('SELECT `judul`, `deskripsi`, `pengadu`, `hunian`, `aprs_aduan`.`status` as sstatus,`teknisi`, `ktp`, `nama`, `kode_penghuni`, `kontak`, `aprs_aduan`.`created_at` as tgladuan FROM `aprs_aduan` LEFT JOIN `aprs_penghuni` ON `kode_penghuni` = `pengadu` WHERE date(aprs_aduan.created_at) = CURDATE() ORDER BY aprs_aduan.created_at DESC');
        return $builder;
    }

    public function countAduanWithUserToday()
    {
        $builder = $this->db->query('SELECT `status` , count(id_aduan) as jumlahperstatus from aprs_aduan WHERE date(aprs_aduan.created_at) = CURDATE() GROUP BY `status`');
        return $builder;
    }
}
