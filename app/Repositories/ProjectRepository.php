<?php

namespace App\Repositories;

use App\Models\Project;

class ProjectRepository extends Repository
{

    /**
     * @inheritDoc
     */
    public function model()
    {
        return Project::class;
    }

    public function getByProjectRef($projectRef)
    {
        return $this->query()
            ->with('photo')
            ->ofRef($projectRef)
            ->firstOrFail();
    }

    public function getByPaginate($limit = 15)
    {
        return $this->query()
            ->with('photo')
            ->latest()
            ->paginate($limit);
    }

    public function storeByRequest($request)
    {
        return $this->query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
    }

    public function updateByRequest($request, $projectRef)
    {
        return $this->query()
            ->findOrFail($projectRef)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
            ]);
    }
}
