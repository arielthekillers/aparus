<?php

namespace App\Models;

use CodeIgniter\Model;

class Role_model extends Model
{
    protected $table      = 'role';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'role_id';
    protected $allowedFields = ['role_name'];


    public function roleWithAssign($userId)
    {
        $builder = $this->db->table('tbl_user_role');
        $builder->select('*');
        $builder->join('tbl_role', 'role_user_id = user_role_id', 'LEFT');
        $builder->where('type', 'PPTK');
        $builder->where('id_user', $userId);
        return $builder->get();
    }
}
