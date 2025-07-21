<?php

namespace App\Models;

use CodeIgniter\Model;

class ReportTypeModel extends Model
{
    protected $table = 'report_types';
    protected $primaryKey = 'id';
    protected $allowedFields = ['type_name', 'description', 'created_at', 'updated_at'];
    protected $returnType = 'object';

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}