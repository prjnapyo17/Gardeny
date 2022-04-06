<?php

namespace App\Controllers;

class Learn extends BaseController
{
    public function index()
    {
        return view('learnpage/daftartanaman');
    }
    public function detail()
    {
        return view('learnpage/tanaman');
    }
}