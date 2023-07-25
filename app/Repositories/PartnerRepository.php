<?php

namespace App\Repositories;

use App\Models\Partner;

class PartnerRepository extends Repository
{

    /**
     * @inheritDoc
     */
    public function model()
    {
        return Partner::class;
    }

    public function getByPartnerRef($partnerRef)
    {
        return $this->query()
            ->with('logo')
            ->ofRef($partnerRef)
            ->firstOrFail();
    }

    public function getByPaginate($limit = 15)
    {
        return $this->query()
            ->with('logo')
            ->latest()
            ->paginate($limit);
    }

    public function storeByRequest($request)
    {
        return $this->query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'description' => $request->description,
        ]);
    }

    public function updateByRequest($request, $partnerId)
    {
        return $this->query()
            ->findOrFail($partnerId)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'description' => $request->description,
            ]);
    }
}
