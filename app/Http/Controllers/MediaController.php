<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MediaController extends Controller
{
    public function index()
    {
        return response()->json(Media::all(), Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'file_name' => 'required|string|max:255',
            'file_type' => 'required|string|max:255',
            'file_url' => 'required|string|max:255',
            'file_size' => 'required|integer',
            'uploaded_by' => 'required|integer',
        ]);

        $media = Media::create($validated);
        return response()->json($media, Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $media = Media::findOrFail($id);
        return response()->json($media, Response::HTTP_OK);
    }

    public function update(Request $request, $id)
    {
        $media = Media::findOrFail($id);
        $media->update($request->all());
        return response()->json($media, Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $media = Media::findOrFail($id);
        $media->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
