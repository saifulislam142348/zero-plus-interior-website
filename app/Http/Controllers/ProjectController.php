<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use App\Repositories\ProjectRepository;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct(
        protected CategoryRepository $categoryRepository,
        protected ProjectRepository $projectRepository
    )
    {
    }

    public function projects()
    {
        $categories = $this->categoryRepository->getAll();
        $projects = $this->projectRepository->getLatestProjects();

        return view('projects')->with([
            'categories' => $categories,
            'projects' => $projects
        ]);
    }
}
