<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct(
        protected CategoryRepository $categoryRepository
    )
    {
    }
}
