<?php

namespace App\Repositories;

use App\Models\Leader;

class LeaderRepository extends Repository
{

    /**
     * @inheritDoc
     */
    public function model()
    {
        return Leader::class;
    }

    public function getByLeaderRef($leaderRef)
    {
        return $this->query()
            ->with('photo')
            ->ofRef($leaderRef)
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
            'designation' => $request->designation,
            'description' => $request->description,
        ]);
    }

    public function updateByRequest($request, $leaderRef)
    {
        return $this->query()
            ->findOrFail($leaderRef)
            ->update([
                'name' => $request->name,
                'designation' => $request->designation,
                'description' => $request->description,
            ]);
    }
}
