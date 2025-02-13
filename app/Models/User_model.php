<?php

namespace App\Models;

use CodeIgniter\Model;

class User_model extends Model
{
    protected $table      = 'user';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['user_nama', 'user_nick', 'user_nik', 'user_email', 'password', 'status', 'avatar'];

    function checkUser()
    {
        $builder = $this->db->table('user');
        $builder->select('*');
        $query = $builder->get();
        return $query->getResultArray();
    }
    function getAll()
    {
        $builder = $this->db->table('user');
        $builder->select('*');
        $query = $builder->get();
        return $query->getResultArray();
    }

    function getPpk($user)
    {
        $builder = $this->db->table('tbl_user');
        $builder->select('user_nip, user_id, user_nama, user_jabatan, user_nomor_sk');
        $builder->where('user_id', $user);
        $query = $builder->get();
        return $query->getRow();
    }

    function getAllPpk()
    {
        $builder = $this->db->table('tbl_user');
        $builder->select('user_id, user_nama , user_nip , user_role_id');
        $builder->where('type', 'PPK');
        $builder->join('tbl_user_role', 'user_id = id_user');
        return $builder->get();
    }
}
