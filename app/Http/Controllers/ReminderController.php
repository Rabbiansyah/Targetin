<?php

namespace App\Http\Controllers;

use App\Models\Reminder;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ReminderController extends Controller
{
    public function index(Request $request)
    {
        // Get all tasks for the authenticated user for the dropdown
        $tasks = Task::whereHas('goal', function($q) {
            $q->where('user_id', Auth::id());
        })->with('goal')->get();
        
        // Get reminders for the authenticated user through their tasks
        $query = Reminder::whereHas('task.goal', function($q) {
            $q->where('user_id', Auth::id());
        })->with(['task.goal']);
        
        // Search functionality
        if ($request->filled('search')) {
            $query->whereHas('task', function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%');
            });
        }
        
        // Task filter
        if ($request->filled('task_id')) {
            $query->where('task_id', $request->task_id);
        }
        
        // Status filter
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        
        $reminders = $query->orderBy('reminder_date', 'asc')->paginate(10);
        
        return view('tambahReminder', compact('reminders', 'tasks'));
    }

    public function create($taskId)
    {
        $task = Task::findOrFail($taskId);
        return view('reminders.create', compact('task'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'task_id' => 'required|exists:tasks,id',
            'reminder_date' => 'required|date',
            'reminder_time' => 'required',
            'method' => 'required|in:notification',
            'status' => 'required|in:pending,sent',
        ]);

        // Verify that the task belongs to the authenticated user
        $task = Task::whereHas('goal', function($q) {
            $q->where('user_id', Auth::id());
        })->where('id', $request->task_id)->firstOrFail();

        // Combine date and time
        $reminderDateTime = Carbon::createFromFormat('Y-m-d H:i', $request->reminder_date . ' ' . $request->reminder_time);

        Reminder::create([
            'task_id' => $request->task_id,
            'reminder_date' => $reminderDateTime,
            'method' => $request->input('method'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('reminders.index')->with('success', 'Reminder berhasil ditambahkan.');
    }

    public function edit($reminder_id)
    {
        $reminder = Reminder::with(['task.goal'])->where('reminder_id', $reminder_id)->firstOrFail();
        
        // Verify that the reminder belongs to the authenticated user through the task
        if ($reminder->task->goal->user_id !== Auth::id()) {
            abort(403);
        }

        $tasks = Task::whereHas('goal', function($q) {
            $q->where('user_id', Auth::id());
        })->with('goal')->get();

        return view('reminders.edit', compact('reminder', 'tasks'));
    }

    public function update(Request $request, $reminder_id)
    {
        $reminder = Reminder::with(['task.goal'])->where('reminder_id', $reminder_id)->firstOrFail();
        
        // Verify that the reminder belongs to the authenticated user through the task
        if ($reminder->task->goal->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'task_id' => 'required|exists:tasks,id',
            'reminder_date' => 'required|date',
            'reminder_time' => 'required',
            'method' => 'required|in:notification',
            'status' => 'required|in:pending,sent',
        ]);

        // Verify that the new task belongs to the authenticated user
        $task = Task::whereHas('goal', function($q) {
            $q->where('user_id', Auth::id());
        })->where('id', $request->task_id)->firstOrFail();

        // Combine date and time
        $reminderDateTime = Carbon::createFromFormat('Y-m-d H:i', $request->reminder_date . ' ' . $request->reminder_time);

        // Update the reminder
        $reminder->update([
            'task_id' => $request->task_id,
            'reminder_date' => $reminderDateTime,
            'method' => $request->input('method'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('reminders.index')->with('success', 'Reminder berhasil diperbarui.');
    }

    public function destroy($reminder_id)
    {
        $reminder = Reminder::with(['task.goal'])->where('reminder_id', $reminder_id)->firstOrFail();
        
        // Verify that the reminder belongs to the authenticated user through the task
        if ($reminder->task->goal->user_id !== Auth::id()) {
            abort(403);
        }

        $reminder->delete();
        return redirect()->route('reminders.index')->with('success', 'Reminder berhasil dihapus.');
    }
}
