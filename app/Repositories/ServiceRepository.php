<?php

namespace App\Repositories;

use App\Models\Service;

class ServiceRepository extends Repository
{

    /**
     * @inheritDoc
     */
    public function model()
    {
        return Service::class;
    }

    public function getByServiceRef($serviceRef)
    {
        return $this->query()
            ->with('photo', 'photos')
            ->ofRef($serviceRef)
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
            'title' => $request->title,
            'description' => $request->description,
        ]);
    }

    public function updateByRequest($request, $serviceRef)
    {
        return $this->query()
            ->findOrFail($serviceRef)
            ->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);
    }
}
