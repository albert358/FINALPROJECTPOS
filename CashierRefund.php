<?php

namespace App\Controllers;

class CashierRefund extends BaseController
{
    public function index()
    {
        return view('cashier/refunds', [
            'page_title' => 'Refund Requests'
        ]);
    }
}
