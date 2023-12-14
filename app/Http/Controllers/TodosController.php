<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodosModal;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\QueryException;

class TodosController extends Controller
{    
    public function index()
    {
        try {
            $TodosModal = TodosModal::paginate(10);
            return response()->json($TodosModal);
        } catch (QueryException $e) {
            return response()->json(['error' => 'An error occurred while fetching tasks'], 500);
        }
    }

    
public function show(Request $request)
{
    try {
        $id = $request->route('id');
        $todo = TodosModal::findOrFail($id);

        return response()->json($todo);
    } catch (ModelNotFoundException $e) {
        return response()->json(['error' => 'Task not found'], 404);
    } catch (\Exception $e) {
        return response()->json(['error' => 'An error occurred while fetching the task'], 500);
    }
}
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string',
                'status' => 'required|boolean',
            ]);
    
            $todo = TodosModal::create($validatedData);
    
            return response()->json(['message' => 'Task created sucessfully', 'task' => $todo], 201);

        } catch (ValidationException $e) {
            return response()->json(['error' => $e->getMessage()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while creating the task'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $todo = TodosModal::findOrFail($id);
    
            $validatedData = $request->validate([
                'title' => 'required|string',
                'status' => 'required|boolean',
            ]);
    
            $todo->update($validatedData);
    
            return response()->json(['message' => 'Task updated sucessfully', 'task' => $todo]);

        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Task not found'], 404);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->getMessage()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while updating the task'], 500);
        }
    }

    public function destroy($id)
{
      try {
        $todo = TodosModal::findOrFail($id);
        $todo->delete();

        return response()->json(['message' => 'Task deleted successfully'],200);
    } catch (ModelNotFoundException $e) {
        return response()->json(['error' => 'Task not found'], 404);
    } catch (\Exception $e) {
        return response()->json(['error' => 'An error occurred while deleting the task'], 500);
    }
}

public function Markcomplete($id)
{
    try {
        $todo = TodosModal::findOrFail($id);
        $todo->update(['status' => true]);

        return response()->json(['message' => 'Task status changed to complete', 'task' => $todo],200);
    } catch (ModelNotFoundException $e) {
        return response()->json(['error' => 'Task not found'], 404);
    } catch (\Exception $e) {
        return response()->json(['error' => 'An error occurred while completing the task'], 500);
    }
}
public function markAsIncomplete($id)
{
    try {
        $todosModal = TodosModal::findOrFail($id);
        $todosModal->update(['status' => false]);
        return response()->json(['message' => 'Task status changed to In-complete', 'task' => $todosModal],200);

    } catch (ModelNotFoundException $e) {
        return response()->json(['error' => 'Task not found'], 404);
    } catch (\Exception $e) {
        return response()->json(['error' => 'An error occurred while marking the task as incomplete'], 500);
    }
}
}
