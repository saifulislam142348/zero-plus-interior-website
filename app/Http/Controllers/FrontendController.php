<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        return view('index');
    }

    public function about()
    {
        return view('about');
    }

    public function servies()
    {
        return view('services');
    }

    public function partners()
    {
        return view('partners');
    }

    public function clients()
    {
        return view('clients');
    }
}
