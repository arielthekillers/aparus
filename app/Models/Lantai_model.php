<?php

namespace App\Models;


use CodeIgniter\Model;

class Lantai_model extends Model
{
    protected $table      = 'master_lantai';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'lantai_id';
    protected $allowedFields = ['lantai_nama', 'lantai_kode', 'lantai_kapasitas', 'rusun_kode', 'id_rusun'];


    public function getLantaiWithTotalKamar($id)
    {
        $builder = $this->db->table('master_lantai');
        $builder->select('lantai_id, lantai_kode,lantai_nama,id_rusun, COUNT(kamar_id) as jumlahKamar');
        $builder->join('master_kamar', 'lantai_id = id_lantai', 'LEFT');
        $builder->where('id_rusun', $id);
        $builder->orderBy('lantai_id', 'ASC');
        $builder->groupBy('lantai_id');
        return $builder->get();
    }
}
