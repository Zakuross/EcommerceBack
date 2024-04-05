<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(): JsonResponse
    {
        $blogs = BlogResource::collection(Blog::all());

        return response()->json([
            'blogs' => $blogs
        ]);
    }

    public function show($id)
    {
        $blogs = Blog::find($id);
        $blogs = BlogResource::make($blogs);

        return response()->json([
            'blogs'=>$blogs
        ]);

    }

    public function store(BlogRequest $request): JsonResponse
    {
        $blogs = Blog::create($request->all());

        $blogs = BlogResource::make($blogs);

        return response()->json([
            'blogs'=>$blogs
        ]);

    }

    public function update($id, BlogRequest $request): JsonResponse
    {
        $blogs = Blog::find($id);
        $blogs->update($request->all());
        $blogs->save();
        $blogs = BlogResource::make($blogs);

        return response()->json([
            'blogs'=>$blogs
        ]);

    }

    public function destroy($id): JsonResponse
    {
        $blogs = Blog::find($id);
        $blogs->delete();

        return response()->json([
            'blogs'=>$blogs
        ]);

    }
}
