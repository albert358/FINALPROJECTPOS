<?php

namespace App\Controllers;

class TransactionHistory extends BaseController
{
    public function index()
    {
        $data['page_title'] = 'Transaction History';
        return view('admin/transaction_history', $data);
    }
}
