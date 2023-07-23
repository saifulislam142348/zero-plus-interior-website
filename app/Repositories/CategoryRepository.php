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
}
