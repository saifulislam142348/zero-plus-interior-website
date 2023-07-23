<?php

namespace App\Observers;

use App\Models\Category;
use Illuminate\Support\Str;

class CategoryObserver
{
    public function created(Category $category)
    {
        do{
            $category->ref = mb_strtoupper(Str::random(10));
        }while(Category::where('ref', $category->ref)->first());

        $category->save();
    }
}
