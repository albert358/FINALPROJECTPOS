<?php

namespace App\Controllers;

class DailyReport extends BaseController
{
    public function index()
    {
        $data['page_title'] = 'Daily Report';
        return view('admin/report_daily', $data);
    }
}
