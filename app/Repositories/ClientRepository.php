<?php

namespace App\Repositories;

use App\Models\Customer;

class ClientRepository extends Repository
{

    /**
     * @inheritDoc
     */
    public function model()
    {
        return Customer::class;
    }

    public function getByClientRef($customerRef)
    {
        return $this->query()
            ->with('photo')
            ->ofRef($customerRef)
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

    public function updateByRequest($request, $customerRef)
    {
        return $this->query()
            ->findOrFail($customerRef)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
            ]);
    }
}
