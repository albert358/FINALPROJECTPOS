<?php

namespace App\Controllers;

class Refunds extends BaseController
{
    public function index()
    {
        $data['page_title'] = 'Refunds';
        return view('admin/refunds', $data);
    }
}
