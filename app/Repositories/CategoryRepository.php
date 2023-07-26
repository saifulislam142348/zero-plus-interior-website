<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository extends Repository
{

    /**
     * @inheritDoc
     */
    public function model()
    {
        return Category::class;
    }

    public function getByPaginate($limit = 15)
    {
        return $this->query()->latest()->paginate($limit);
    }

    public function storeByRequest($request)
    {
        return $this->query()->create([
            'name' => $request->name,
            'description' => $request->description
        ]);
    }

    public function updateByRequest($request, $categoryRef)
    {
        return $this->query()
            ->ofRef($categoryRef)
            ->firstOrFail()
            ->update([
                    'name' => $request->name,
                    'description' => $request->description
                ]
            );
    }
}
