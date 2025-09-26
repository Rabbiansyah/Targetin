<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        
        // Ambil semua goals milik user
        $goals = Goal::where('user_id', $userId)->get();
        
        // Hitung statistik
        $totalGoals = $goals->count();
        $completedGoals = $goals->where('status', 'completed')->count();
        $pendingGoals = $goals->whereIn('status', ['pending', 'in_progress'])->count();
        
        // Hitung persentase progress
        $progressPercent = $totalGoals > 0 ? round(($completedGoals / $totalGoals) * 100) : 0;
        
        // Ambil goals terbaru untuk ditampilkan di daftar (maksimal 5)
        $recentGoals = Goal::where('user_id', $userId)
                          ->orderBy('created_at', 'desc')
                          ->limit(5)
                          ->get();
        
        return view('dashboard', compact(
            'totalGoals',
            'completedGoals', 
            'pendingGoals',
            'progressPercent',
            'recentGoals'
        ));
    }
}
