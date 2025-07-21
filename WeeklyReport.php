<?php

namespace App\Controllers;

class WeeklyReport extends BaseController
{
    public function index()
    {
        $data['page_title'] = 'Weekly Report';
        return view('admin/report_weekly', $data);
    }
}
