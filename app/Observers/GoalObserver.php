<?php

namespace App\Observers;

use App\Models\Goal;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

class GoalObserver
{
    /**
     * Handle after goal created/updated/deleted.
     */
    private function updateReport($userId)
    {
        $totalGoals = Goal::where('user_id', $userId)->count();
        $completedGoals = Goal::where('user_id', $userId)->where('status', 'completed')->count();
        $successRate = $totalGoals > 0 ? ($completedGoals / $totalGoals) * 100 : 0;

        Report::updateOrCreate(
            [
                'user_id' => $userId,
                'start_date' => now()->startOfMonth(),
                'end_date'   => now()->endOfMonth(),
            ],
            [
                'total_goals'     => $totalGoals,
                'completed_goals' => $completedGoals,
                'success_rate'    => $successRate,
            ]
        );
    }

    public function created(Goal $goal)
    {
        $this->updateReport($goal->user_id);
    }

    public function updated(Goal $goal)
    {
        $this->updateReport($goal->user_id);
    }

    public function deleted(Goal $goal)
    {
        $this->updateReport($goal->user_id);
    }
}
