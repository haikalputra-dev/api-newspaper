<?php

namespace App\Http\Controllers;

use App\Models\Action;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ActionController extends Controller
{
    public function index()
    {
        return response()->json(Action::all(), Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer',
            'target_id' => 'required|integer',
            'actions' => 'required|string',
        ]);

        $action = Action::create($validated);
        return response()->json($action, Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $action = Action::findOrFail($id);
        return response()->json($action, Response::HTTP_OK);
    }

    public function update(Request $request, $id)
    {
        $action = Action::findOrFail($id);
        $action->update($request->all());
        return response()->json($action, Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $action = Action::findOrFail($id);
        $action->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
