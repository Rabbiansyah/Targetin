<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\FinancialGoal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::where('user_id', Auth::id())->with('financialGoal')->get();
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $financialGoals = FinancialGoal::where('user_id', Auth::id())->get();
        return view('transactions.create', compact('financialGoals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
            'type' => 'required|in:income,expense',
            'category' => 'nullable|string|max:50',
            'note' => 'nullable|string',
            'transaction_date' => 'required|date',
            'financial_goal_id' => 'nullable|exists:financial_goals,id',
        ]);

        Transaction::create([
            'user_id' => Auth::id(),
            'financial_goal_id' => $request->financial_goal_id,
            'amount' => $request->amount,
            'type' => $request->type,
            'category' => $request->category,
            'note' => $request->note,
            'transaction_date' => $request->transaction_date,
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    public function edit(Transaction $transaction)
    {
        $financialGoals = FinancialGoal::where('user_id', Auth::id())->get();
        return view('transactions.edit', compact('transaction', 'financialGoals'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
            'type' => 'required|in:income,expense',
            'category' => 'nullable|string|max:50',
            'note' => 'nullable|string',
            'transaction_date' => 'required|date',
            'financial_goal_id' => 'nullable|exists:financial_goals,id',
        ]);

        $transaction->update($request->all());

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}
