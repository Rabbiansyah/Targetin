<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'goal_id',
        'title',
        'description',
        'due_date',
        'status',
    ];

    protected $casts = [
        'due_date' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];


    // Relasi
    public function goal()
    {
        return $this->belongsTo(Goal::class);
    }

    public function reminders()
    {
        return $this->hasMany(Reminder::class);
    }
}
