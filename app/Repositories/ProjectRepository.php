<?php

namespace App\Repositories;

use App\Models\Project;
use Carbon\Carbon;

class ProjectRepository extends Repository
{

    /**
     * @inheritDoc
     */
    public function model()
    {
        return Project::class;
    }

    public function getLatestProjects()
    {
        return $this->query()
            ->select('id', 'ref', 'title', 'category_id', 'thumbnail_id')
            ->with('category:id,ref,name', 'thumbnail')
            ->latest()
            ->take(50)
            ->get();
    }

    public function getProjectByCategoryRef($categoryId)
    {
        return $this->query()
            ->select('id', 'ref', 'title', 'category_id', 'thumbnail_id')
            ->with('category:id,ref,name', 'thumbnail')
            ->where('category_id', $categoryId)
            ->latest()
            ->get();
    }

    public function getByProjectRef($projectRef)
    {
        return $this->query()
            ->with('thumbnail', 'category', 'customer', 'partners', 'photos')
            ->ofRef($projectRef)
            ->firstOrFail();
    }

    public function getByPaginate($limit = 15)
    {
        $query = $this->query()
            ->with('thumbnail', 'category', 'customer')
            ->latest()
            ->paginate($limit);

        return $query;
    }

    public function storeByRequest($request)
    {
        return $this->query()->create([
            'category_id' => $request->category_id,
            'customer_id' => $request->client_id,
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'start_date' => $request->start_date ? Carbon::parse($request->start_date)->format('Y-m-d') : null,
            'end_date' => $request->end_date ? Carbon::parse($request->end_date)->format('Y-m-d') : null,
            'status' => $request->status,
        ]);
    }

    public function updateByRequest($request, $projectRef)
    {
        return $this->query()->ofRef($projectRef)
            ->firstOrFail()
            ->update([
                'category_id' => $request->category_id,
                'customer_id' => $request->client_id,
                'title' => $request->title,
                'description' => $request->description,
                'location' => $request->location,
                'start_date' => $request->start_date ? Carbon::parse($request->start_date)->format('Y-m-d') : null,
                'end_date' => $request->end_date ? Carbon::parse($request->end_date)->format('Y-m-d') : null,
                'status' => $request->status,
            ]);
    }
}
