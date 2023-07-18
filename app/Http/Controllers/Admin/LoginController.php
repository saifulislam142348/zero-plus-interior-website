<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LoginController extends Controller
{
    public function __construct()
    {
    }

    public function login()
    {
        return Inertia::render('Auth/Login', [

        ]);
    }
}
