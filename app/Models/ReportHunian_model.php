<?php

namespace App\Models;

use CodeIgniter\Model;

class ReportHunian_model extends Model
{
    protected $table      = 'kontrak';
    protected $primaryKey = 'kontrak_id';
    protected $allowedFields = ['status_kontrak', 'nomor_kontrak', 'penghuni', 'kamar', 'tgl_awal_kontrak', 'tgl_akhir_kontrak'];

    public function getPenghuni($rusun = null)
    {
        $builder = $this->db->table('aprs_penghuni');
        $builder->select('
            aprs_penghuni.*,
            aprs_master_rusun.rusun_nama as nama_rusun,
            aprs_master_kamar.kamar_nomor as nomor_kamar,
            aprs_kontrak.tgl_awal_kontrak,
            aprs_kontrak.tgl_akhir_kontrak,
            aprs_kontrak.status_kontrak
        ');
        $builder->join('aprs_master_rusun', 'aprs_penghuni.rusuntujuan = aprs_master_rusun.rusun_id', 'LEFT');
        $builder->join('aprs_kontrak', 'aprs_penghuni.kode_penghuni = aprs_kontrak.penghuni', 'LEFT');
        $builder->join('aprs_master_kamar', 'aprs_kontrak.kamar = aprs_master_kamar.kamar_id', 'LEFT');

        if ($rusun) {
            $builder->where('aprs_penghuni.rusuntujuan', $rusun);
        }

        return $builder->get()->getResult();
    }

    public function getStatistikPenghuni()
    {
        $builder = $this->db->table('master_rusun');
        $builder->select([
            'master_rusun.rusun_id',
            'master_rusun.rusun_nama as nama_rusun',
            'COUNT(DISTINCT aprs_penghuni.kode_penghuni) as total_kk',
            '(COUNT(DISTINCT aprs_penghuni.kode_penghuni) + COUNT(ak.id_anggotakeluarga)) as total_penghuni'
        ]);
        $builder->join('aprs_penghuni', 'master_rusun.rusun_id = aprs_penghuni.rusuntujuan', 'LEFT');
        $builder->join('anggotakeluarga ak', 'aprs_penghuni.kode_penghuni = ak.kode_penghuni', 'LEFT');
        $builder->groupBy(['master_rusun.rusun_id', 'master_rusun.rusun_nama']);

        return $builder->get()->getResult();
    }

    public function getStatistikGender($rusun = null)
    {
        $builder = $this->db->table('aprs_master_rusun');
        $builder->select([
            'aprs_master_rusun.rusun_id',
            'aprs_master_rusun.rusun_nama as nama_rusun',
            'SUM(CASE 
                WHEN aprs_penghuni.jeniskelamin = "Laki-laki" THEN 1 
                WHEN ak.jenis_kelamin = "Laki-laki" THEN 1
                ELSE 0 
            END) as laki_laki',
            'SUM(CASE 
                WHEN aprs_penghuni.jeniskelamin = "Perempuan" THEN 1 
                WHEN ak.jenis_kelamin = "Perempuan" THEN 1
                ELSE 0 
            END) as perempuan',
            'COUNT(DISTINCT CASE 
                WHEN aprs_penghuni.kode_penghuni IS NOT NULL THEN aprs_penghuni.kode_penghuni
                WHEN ak.id_anggotakeluarga IS NOT NULL THEN ak.id_anggotakeluarga 
            END) as total'
        ]);
        $builder->join('aprs_penghuni', 'aprs_master_rusun.rusun_id = aprs_penghuni.rusuntujuan', 'LEFT');
        $builder->join('anggotakeluarga ak', 'aprs_penghuni.kode_penghuni = ak.kode_penghuni', 'LEFT');

        if ($rusun) {
            $builder->where('aprs_master_rusun.rusun_id', $rusun);
        }

        $builder->groupBy(['aprs_master_rusun.rusun_id', 'aprs_master_rusun.rusun_nama']);
        return $builder->get()->getResult();
    }

    public function getStatistikUmur($rusun = null)
    {
        $builder = $this->db->table('master_rusun');
        $builder->select([
            'master_rusun.rusun_id',
            'master_rusun.rusun_nama as nama_rusun',
            // Balita (0-5 tahun)
            'SUM(CASE 
                WHEN TIMESTAMPDIFF(YEAR, aprs_penghuni.tanggal_lahir, CURDATE()) <= 5 THEN 1 
                WHEN TIMESTAMPDIFF(YEAR, ak.tanggal_lahir, CURDATE()) <= 5 THEN 1
                ELSE 0 
            END) as balita',
            // Remaja (6-16 tahun)
            'SUM(CASE 
                WHEN TIMESTAMPDIFF(YEAR, aprs_penghuni.tanggal_lahir, CURDATE()) BETWEEN 6 AND 16 THEN 1 
                WHEN TIMESTAMPDIFF(YEAR, ak.tanggal_lahir, CURDATE()) BETWEEN 6 AND 16 THEN 1
                ELSE 0 
            END) as remaja',
            // Dewasa (17-59 tahun)
            'SUM(CASE 
                WHEN TIMESTAMPDIFF(YEAR, aprs_penghuni.tanggal_lahir, CURDATE()) BETWEEN 17 AND 59 THEN 1 
                WHEN TIMESTAMPDIFF(YEAR, ak.tanggal_lahir, CURDATE()) BETWEEN 17 AND 59 THEN 1
                ELSE 0 
            END) as dewasa',
            // Lansia (>= 60 tahun)
            'SUM(CASE 
                WHEN TIMESTAMPDIFF(YEAR, aprs_penghuni.tanggal_lahir, CURDATE()) >= 60 THEN 1 
                WHEN TIMESTAMPDIFF(YEAR, ak.tanggal_lahir, CURDATE()) >= 60 THEN 1
                ELSE 0 
            END) as lansia',
            // Total
            'COUNT(DISTINCT CASE 
                WHEN aprs_penghuni.kode_penghuni IS NOT NULL THEN aprs_penghuni.kode_penghuni
                WHEN ak.id_anggotakeluarga IS NOT NULL THEN ak.id_anggotakeluarga 
            END) as total'
        ]);

        $builder->join('aprs_penghuni', 'master_rusun.rusun_id = aprs_penghuni.rusuntujuan', 'LEFT');
        $builder->join('anggotakeluarga ak', 'aprs_penghuni.kode_penghuni = ak.kode_penghuni', 'LEFT');

        if ($rusun) {
            $builder->where('master_rusun.rusun_id', $rusun);
        }

        $builder->groupBy(['master_rusun.rusun_id', 'master_rusun.rusun_nama']);

        return $builder->get()->getResult();
    }

    public function getStatistikKamar($rusun = null)
    {
        $builder = $this->db->table('aprs_master_rusun');
        $builder->select([
            'aprs_master_rusun.rusun_id',
            'aprs_master_rusun.rusun_nama as nama_rusun',
            'aprs_master_rusun.rusun_kode',
            'COUNT(DISTINCT mk.kamar_id) as total_kamar',
            'COUNT(DISTINCT CASE 
                WHEN k.status_kontrak = "Terkontrak" THEN mk.kamar_id 
            END) as kamar_terisi',
            'COUNT(DISTINCT mk.kamar_id) - COUNT(DISTINCT CASE 
                WHEN k.status_kontrak = "Terkontrak" THEN mk.kamar_id 
            END) as kamar_kosong'
        ]);
        $builder->join('aprs_master_kamar mk', 'aprs_master_rusun.rusun_kode = SUBSTRING(mk.kamar_kode, 1, 2)', 'LEFT');
        $builder->join('aprs_kontrak k', 'mk.kamar_id = k.kamar AND k.status_kontrak = "Terkontrak"', 'LEFT');

        if ($rusun) {
            $builder->where('aprs_master_rusun.rusun_id', $rusun);
        }

        $builder->groupBy(['aprs_master_rusun.rusun_id', 'aprs_master_rusun.rusun_nama', 'aprs_master_rusun.rusun_kode']);
        return $builder->get()->getResult();
    }
}
