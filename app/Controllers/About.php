<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class About extends BaseController
{

    public function __construct()
    {
        //helper(['string']);
    }

    public function index()
    {
        return view('about/about');
    }
    public function privacy()
    {
        return view('about/privacy');
    }
}
