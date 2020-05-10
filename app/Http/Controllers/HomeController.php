<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        return view('home.index');
    }
}
