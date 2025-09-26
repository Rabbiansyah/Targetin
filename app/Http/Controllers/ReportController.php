<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::where('user_id', Auth::id())->get();
        return view('reports.index', compact('reports'));
    }

    public function create()
    {
        return view('reports.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'period_start' => 'required|date',
            'period_end' => 'required|date|after_or_equal:period_start',
        ]);

        Report::create([
            'user_id' => Auth::id(),
            'period_start' => $request->period_start,
            'period_end' => $request->period_end,
            'total_goals' => $request->total_goals ?? 0,
            'completed_goals' => $request->completed_goals ?? 0,
            'success_rate' => $request->success_rate ?? 0,
        ]);

        return redirect()->route('reports.index')->with('success', 'Report berhasil ditambahkan.');
    }

    public function show(Report $report)
    {
        return view('reports.show', compact('report'));
    }

    public function destroy(Report $report)
    {
        $report->delete();
        return redirect()->route('reports.index')->with('success', 'Report berhasil dihapus.');
    }
}
