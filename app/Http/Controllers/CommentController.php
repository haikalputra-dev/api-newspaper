<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CommentController extends Controller
{
    public function index()
    {
        return response()->json(Comment::all(), Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'comment' => 'required|string',
            'user_id' => 'required|integer',
            'article_id' => 'required|integer',
        ]);

        $comment = Comment::create($validated);
        return response()->json($comment, Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $comment = Comment::findOrFail($id);
        return response()->json($comment, Response::HTTP_OK);
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->update($request->all());
        return response()->json($comment, Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
