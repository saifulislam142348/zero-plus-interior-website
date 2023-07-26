<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function __construct(
        protected CategoryRepository $categoryRepository
    )
    {
    }

    public function index()
    {
        $categories = $this->categoryRepository->getByPaginate();

        return Inertia::render('Category/CategoryList', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:3', 'unique:categories,name']
        ]);

        $this->categoryRepository->storeByRequest($request);

        return to_route('category.index');
    }

    public function update(Request $request, $categoryRef)
    {
        $category = $this->categoryRepository->query()->ofRef($categoryRef)->firstOrFail();

        $request->validate([
            'name' => ['required', 'min:3', 'unique:categories,name,'.$category->id]
        ]);

        $this->categoryRepository->updateByRequest($request, $categoryRef);

        return to_route('category.index');
    }

    public function destroy($categoryRef)
    {
        $category = $this->categoryRepository->query()->ofRef($categoryRef)->firstOrFail();
        $category->delete();

        return to_route('category.index');
    }
}
