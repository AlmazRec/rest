<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{

    public function index(): JsonResponse
    {
        return response()->json(Category::all());
    }


    public function store(StoreCategoryRequest $request): Category
    {
        return Category::create($request->all());
    }


    public function show(Category $category): JsonResponse
    {
        return response()->json($category);
    }


    public function update(UpdateCategoryRequest $request, Category $category): JsonResponse
    {
        $category->update($request->all());

        return response()->json($category);
    }


    public function destroy(Category $category):  JsonResponse
    {
        $category->delete();

        return response()->json(['Category destroyed'], 204);
    }
}
