<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(): JsonResponse
    {
        $comments = CommentResource::collection(Comment::all());

        return response()->json([
            'comments' => $comments
        ]);
    }

    public function show($id)
    {
        $comments = Comment::find($id);
        $comments = CommentResource::make($comments);

        return response()->json([
            'comments'=>$comments
        ]);
    }

    public function store(CommentRequest $request)
    {
        $comments = Comment::create($request->all());

        $comments = CommentResource::make($comments);

        return response()->json([
            'comments'=>$comments
        ]);
    }

    public function update($id, CommentRequest $request)
    {
        $comments = Comment::find($id);
        $comments->update($request->all());
        $comments->save();
        $comments = CommentResource::make($comments);

        return response()->json([
            'comments'=>$comments
        ]);
    }

    public function destroy($id)
    {
        $comments = Comment::find($id);
        $comments->delete();

        return response()->json([
            'comments'=>$comments
        ]);
    }

}
