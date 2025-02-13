<?php

namespace App\Models;

use CodeIgniter\Model;

class Waterusage_model extends Model
{
    protected $table      = 'water_usage';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'waterusage_id';
    protected $allowedFields = ['kode_kamar', 'bulan', 'tahun', 'kilometer', 'pemakaian', 'pencatat'];

    public function getWaterUsage($rusun, $lantai)
    {
        $builder = $this->db->table('master_kamar');
        $builder->select('*');
        $builder->join('water_usage', 'kode_kamar = kamar_kode', 'LEFT');
        $builder->where('master_kamar.id_lantai', $lantai);
        $builder->where('water_usage.bulan', date('m'));
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
