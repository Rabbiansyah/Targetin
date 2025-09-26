<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Goal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        // Get all goals for the authenticated user for the dropdown
        $goals = Goal::where('user_id', Auth::id())->get();
        
        // Get tasks for the authenticated user through their goals
        $query = Task::whereHas('goal', function($q) {
            $q->where('user_id', Auth::id());
        })->with('goal');
        
        // Search functionality
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }
        
        // Goal filter
        if ($request->filled('goal_id')) {
            $query->where('goal_id', $request->goal_id);
        }
        
        // Status filter
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        
        $tasks = $query->orderBy('created_at', 'desc')->paginate(10);
        
        return view('tambahTask', compact('tasks', 'goals'));
    }

    public function create($goalId)
    {
        $goal = Goal::findOrFail($goalId);
        return view('tasks.create', compact('goal'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'goal_id' => 'required|exists:goals,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'status' => 'required|in:pending,in_progress,completed',
        ]);

        // Verify that the goal belongs to the authenticated user
        $goal = Goal::where('id', $request->goal_id)
                   ->where('user_id', Auth::id())
                   ->firstOrFail();

        Task::create([
            'goal_id' => $request->goal_id,
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'status' => $request->status,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task berhasil ditambahkan.');
    }

    public function edit(Task $task)
    {
        // Verify that the task belongs to the authenticated user through the goal
        if ($task->goal->user_id !== Auth::id()) {
            abort(403);
        }

        $goals = Goal::where('user_id', Auth::id())->get();
        return view('tasks.edit', compact('task', 'goals'));
    }

    public function update(Request $request, Task $task)
    {
        // Verify that the task belongs to the authenticated user through the goal
        if ($task->goal->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'goal_id' => 'required|exists:goals,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'status' => 'required|in:pending,in_progress,completed',
        ]);

        // Verify that the new goal belongs to the authenticated user
        $goal = Goal::where('id', $request->goal_id)
                   ->where('user_id', Auth::id())
                   ->firstOrFail();

        $task->update([
            'goal_id' => $request->goal_id,
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'status' => $request->status,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task berhasil diperbarui.');
    }

    public function destroy(Task $task)
    {
        // Verify that the task belongs to the authenticated user through the goal
        if ($task->goal->user_id !== Auth::id()) {
            abort(403);
        }

        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task berhasil dihapus.');
    }
}
