<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleAssign_model extends Model
{
    protected $table      = 'role_assign';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'role_assign_id';
    protected $allowedFields = ['id_user', 'id_role', 'id_rusun'];

    public function assign($data)
    {
        $builder = $this->db->table('tbl_role');
        if ($builder->insertBatch($data)) {
            return true;
        }
    }

    public function getRoleAssign()
    {
        $builder = $this->db->table('user');
        $builder->select('*');
        $builder->join('role_assign', 'id_user = user_id ', 'LEFT');
        $builder->where('status', 'Aktif');
        return $builder->get();
    }
}
