<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Resources\Api\CategoryApiResource;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::withCount(['cosmetics']);

        if ($request->has('limit')){
            $categories->limit($request->input('limit'));
        }
        return CategoryApiResource::collection($categories->get());
    }

    public function show(Category $category)
    {
        $category->load(['cosmetics', 'popularCosmetics']);
        $category->loadCount(['cosmetics']);

        return new CategoryApiResource($category);
    }
}
