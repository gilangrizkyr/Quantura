<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Product extends BaseController
{

    public function index()
    {
        helper(['form']);
        echo view('content/header', ['title' => 'Quantura | Product']);
    }

    public function product()
    {
        return
            view('content/header') .
            view('content/navbar') .
            view('content/sidebar') .
            view('konten/product') .
            view('content/footer');
    }
}
