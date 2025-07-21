<?php

namespace App\Controllers;

class MonthlyReport extends BaseController
{
    public function index()
    {
        $data['page_title'] = 'Monthly Report';
        return view('admin/report_monthly', $data);
    }
}
