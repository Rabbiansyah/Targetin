<?php

namespace App\Http\Controllers;

use App\Models\FinancialGoal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinancialGoalController extends Controller
{
    public function index()
    {
        $financialGoals = FinancialGoal::where('user_id', Auth::id())->get();
        return view('financial_goals.index', compact('financialGoals'));
    }

    public function create()
    {
        return view('financial_goals.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:150',
            'target_amount' => 'required|numeric|min:0',
            'target_date' => 'nullable|date',
            'status' => 'required|in:ongoing,completed',
        ]);

        FinancialGoal::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'target_amount' => $request->target_amount,
            'current_amount' => $request->current_amount ?? 0,
            'target_date' => $request->target_date,
            'status' => $request->status,
        ]);

        return redirect()->route('financial_goals.index')->with('success', 'Financial Goal berhasil ditambahkan.');
    }

    public function edit(FinancialGoal $financialGoal)
    {
        return view('financial_goals.edit', compact('financialGoal'));
    }

    public function update(Request $request, FinancialGoal $financialGoal)
    {
        $request->validate([
            'title' => 'required|string|max:150',
            'target_amount' => 'required|numeric|min:0',
            'current_amount' => 'required|numeric|min:0',
            'target_date' => 'nullable|date',
            'status' => 'required|in:ongoing,completed',
        ]);

        $financialGoal->update($request->all());

        return redirect()->route('financial_goals.index')->with('success', 'Financial Goal berhasil diperbarui.');
    }

    public function destroy(FinancialGoal $financialGoal)
    {
        $financialGoal->delete();
        return redirect()->route('financial_goals.index')->with('success', 'Financial Goal berhasil dihapus.');
    }
}
