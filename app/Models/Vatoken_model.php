<?php

namespace App\Models;

use CodeIgniter\Model;

class Vatoken_model extends Model
{
    protected $table      = 'vatoken';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'token_id';
    protected $allowedFields = [
        'token_data', 'token_datetime'
    ];
}
