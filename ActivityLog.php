<?php

namespace App\Controllers;

class ActivityLog extends BaseController
{
    public function index()
    {
        $data['page_title'] = 'Cashier Activity Log';
        return view('admin/activity_log', $data);
    }
}
