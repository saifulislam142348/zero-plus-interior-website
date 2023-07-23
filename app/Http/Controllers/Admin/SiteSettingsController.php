<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class SiteSettingsController extends Controller
{
    public function __construct(
        protected CategoryRepository $categoryRepository
    )
    {
    }
}
