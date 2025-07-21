<?php

namespace App\Controllers;

class Transaction extends BaseController
{
    public function index()
    {
        $data['page_title'] = 'Transactions';
        return view('admin/transactions', $data);
    }
}
