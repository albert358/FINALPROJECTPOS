<?php

namespace App\Models;

use CodeIgniter\Model;

class ReportRequestModel extends Model
{
    protected $table = 'report_requests';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'cashier_id',
        'report_type_id',
        'date_range_start',
        'date_range_end',
        'additional_notes',
        'status',
        'requested_by_admin_id'
    ];
    protected $returnType = 'object';

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}