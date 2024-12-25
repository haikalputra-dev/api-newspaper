<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    public function index()
    {
        return response()->json(Category::all(), Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category = Category::create($validated);
        return response()->json($category, Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category, Response::HTTP_OK);
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return response()->json($category, Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
