<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class LeaderController extends Controller
{
    public function __construct(
        protected CategoryRepository $categoryRepository
    )
    {
    }
}