<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct()
    {
    }

    public function projects()
    {
        return view('projects');
    }
}