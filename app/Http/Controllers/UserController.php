<?php

// app/Http/Controllers/UserController.php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    // Get all users
    public function index()
    {
        return UserResource::collection(User::all());
    }

    // Get a single user
    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user, Response::HTTP_OK);
    }

    // Create a new user
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password_hash' => 'required|string',
            "full_name" => 'required|string',
            "bio" => 'required|string',
            "profile_image_url" => 'required|string',
            "role" => 'required|string',
        ]);

        $user = User::create($validated);
        return response()->json($user, Response::HTTP_CREATED);
    }

    // Update a user
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return response()->json($user, Response::HTTP_OK);
    }

    // Delete a user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}

