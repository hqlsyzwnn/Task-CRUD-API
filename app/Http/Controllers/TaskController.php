<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Api\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::with('category')->get();

        return response()->json([
            'success' => true,
            'message' => 'Get tasks success',
            'data' => $tasks
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:category,id',
            'description' => 'required|string',
            'status' => 'string',
            'due_date' => 'date'
        ]);

        $tasks = Task::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Task created successfully',
            'data' => $tasks
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tasks = Task::with('category')->findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Get one task success',
            'data' => $tasks
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tasks = Task::with('category')->findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:category,id',
            'description' => 'required|string',
            'status' => 'string',
            'due_date' => 'date'
        ]);

        $tasks->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Task update successfully',
            'data' => $tasks
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tasks = Task::with('category')->findOrFail($id);

        $tasks->delete();

        return response()->json([
            'success' => true,
            'message' => 'Task deleted successfully'
        ], 200);
    }
}
