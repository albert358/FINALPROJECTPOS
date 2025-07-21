<?php

namespace App\Controllers;

class ReportOverview extends BaseController
{
    public function index()
    {
        $data['page_title'] = 'Report Overview';
        return view('admin/report_overview', $data);
    }
}
