<?php

namespace App\Controllers;

class Dashboard extends BaseController
{

    public function index()
    {
        // helper(['form']);
        // echo view('content/header', ['title' => 'Quantura | Dashboard']);
    }

    public function dashboard()
    {
        return view('content/header', ['title' => 'Quantura | Product']) .
            view('content/navbar') .
            view('content/sidebar') .
            view('konten/dashboard') .
            view('content/footer');
        // return view('konten/dashboard', ['title' => 'Quantura | Dashboard']);
    }
}
