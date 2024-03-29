<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
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

    public function store(BlogRequest $request)
    {
        $blogs = Blog::create($request->all());

        $blogs = BlogResource::make($blogs);

        return response()->json([
            'blogs'=>$blogs
        ]);

    }

    public function update($id, BlogRequest $request)
    {
        $blogs = Blog::find($id);
        $blogs->update($request->all());
        $blogs->save();
        $blogs = BlogResource::make($blogs);

        return response()->json([
            'blogs'=>$blogs
        ]);

    }

    public function destroy($id)
    {
        $blogs = Blog::find($id);
        $blogs->delete();

        return response()->json([
            'blogs'=>$blogs
        ]);

    }
}
