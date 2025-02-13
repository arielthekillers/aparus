<?php

namespace App\Models;


use CodeIgniter\Model;

class Shortcut_model extends Model
{
    protected $table      = 'shortcut';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id_shortcut';
    protected $allowedFields = ['nama', 'deskripsi', 'link', 'icon'];
}
