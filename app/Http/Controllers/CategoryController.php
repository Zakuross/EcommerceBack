<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use http\Env\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(): JsonResponse
    {
        $categories = CategoryResource::collection(Category::all());

        return response()->json([
            'categories' => $categories
        ]);


    }

    public function show($id): JsonResponse
    {
        $category = new CategoryResource(Category::find($id));


        return response()->json([
            "category" => $category
        ]);
    }


    public function store(CategoryRequest $request): JsonResponse
    {
//        $this->authorize('create', Category::class);

        $category = new Category();
        $category->name = $request->input('name');
        $category->save();
        $category=CategoryResource::make($category);

        return response()->json([
            'category'=>$category
        ]);

    }

    public function update($id, CategoryRequest $request): JsonResponse
    {
//        $this->authorize('update', Category::class);
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->save();
        $category=CategoryResource::make($category);

        return response()->json([
            'category'=>$category
        ]);

    }

    public function destroy($id): JsonResponse
    {
        $categories=Category::find($id);
//        $this->authorize('delete', $category);
        $categories->delete();
        $categories = CategoryResource::collection(Category::all());

        return response()->json([
            'categories'=>$categories
        ]);

    }
}
