<?php

namespace App\Models;

use CodeIgniter\Model;

class CashierModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'email', 'role', 'status', 'created_at', 'updated_at'];
    protected $returnType = 'object';

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

}