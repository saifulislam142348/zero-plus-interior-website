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

    public function categoryProject($categoryRef)
    {
        $category = $this->categoryRepository->query()->ofRef($categoryRef)->firstOrFail();
        $projects = $this->projectRepository->getProjectByCategoryRef($category->id);

        return view('projects-category')->with([
            'projects' => $projects
        ]);
    }

    public function show($projectRef)
    {
        $project = $this->projectRepository->getByProjectRef($projectRef);

        return view('project-show')->with([
            'project' => $project
        ]);
    }
}
