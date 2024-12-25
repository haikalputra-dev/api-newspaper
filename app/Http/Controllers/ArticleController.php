<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ArticleController extends Controller
{
    public function index()
    {
        return response()->json(Article::all(), Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'featured_image_url' => 'nullable|string|max:255',
            'status' => 'required|string',
            'author_id' => 'required|integer',
            'tag_id' => 'required|integer',
            'category_id' => 'required|integer',
        ]);

        $article = Article::create($validated);
        return response()->json($article, Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return response()->json($article, Response::HTTP_OK);
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->update($request->all());
        return response()->json($article, Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
