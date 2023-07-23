<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function __construct(
        protected CategoryRepository $categoryRepository
    )
    {
    }

    public function index()
    {
        return Inertia::render('Category/CategoryList');
    }
}
