<?php

namespace App\Controllers;

class Orders extends BaseController
{
    public function index(): string
    {
        return view('admin/orders');
    }
}
