<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TagController extends Controller
{
    public function index()
    {
        return response()->json(Tag::all(), Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $tag = Tag::create($validated);
        return response()->json($tag, Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $tag = Tag::findOrFail($id);
        return response()->json($tag, Response::HTTP_OK);
    }

    public function update(Request $request, $id)
    {
        $tag = Tag::findOrFail($id);
        $tag->update($request->all());
        return response()->json($tag, Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
