<?php

namespace App\Controllers;

class CashierTransaction extends BaseController
{
    public function index()
    {
        return view('cashier/transactions', [
            'page_title' => 'Transaction List'
        ]);
    }
}
