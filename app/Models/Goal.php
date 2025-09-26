<?php

namespace App\Models;

use App\Models\Task;
use App\Models\Reminder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class Goal extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'category',
        'start_date',
        'end_date',
        'status',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    /**
     * Get the user that owns the goal.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the tasks for the goal.
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    /**
     * Get the reminders for the goal.
     */
    public function reminders()
    {
        return $this->hasMany(Reminder::class);
    }

    /**
     * Scope a query to only include goals of a given status.
     */
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Scope a query to only include goals of a given category.
     */
    public function scopeCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    /**
     * Check if the goal is overdue.
     */
    public function isOverdue(): bool
    {
        return $this->end_date &&
            $this->end_date->lt(Carbon::now()) &&
            $this->status !== 'completed';
    }

    /**
     * Get the progress percentage of the goal based on completed tasks.
     */
    public function getProgressPercentage()
    {
        $totalTasks = $this->tasks()->count();

        if ($totalTasks === 0) {
            return $this->status === 'completed' ? 100 : 0;
        }

        $completedTasks = $this->tasks()->where('status', 'completed')->count();

        return round(($completedTasks / $totalTasks) * 100);
    }
}
