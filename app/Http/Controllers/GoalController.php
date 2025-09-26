<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Goal::where('user_id', Auth::id());

        // Search functionality
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // Category filter
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Status filter
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $goals = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('kelola', compact('goals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|string|in:akademik,pribadi,ekstrakurikuler',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        Goal::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => 'ongoing',
        ]);

        return redirect()->route('dashboard')
            ->with('success', 'Goal berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Goal $goal)
    {
        // Pastikan user hanya bisa melihat goal miliknya sendiri
        if ($goal->user_id !== Auth::id()) {
            abort(403);
        }

        return view('goals.show', compact('goal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Goal $goal)
    {
        // Pastikan user hanya bisa edit goal miliknya sendiri
        if ($goal->user_id !== Auth::id()) {
            abort(403);
        }

        return view('goals.edit', compact('goal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Goal $goal)
    {
        // Pastikan user hanya bisa update goal miliknya sendiri
        if ($goal->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|string|in:akademik,pribadi,ekstrakurikuler',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'status' => 'required|string|in:ongoing,completed,failed',
        ]);

        $goal->update([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->status,
        ]);

        return redirect()->route('kelola')
            ->with('success', 'Goal berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Goal $goal)
    {
        // Pastikan user hanya bisa hapus goal miliknya sendiri
        if ($goal->user_id !== Auth::id()) {
            abort(403);
        }

        $goal->delete();

        return redirect()->route('kelola')
            ->with('success', 'Goal berhasil dihapus!');
    }
}
