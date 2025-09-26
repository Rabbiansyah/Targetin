<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reminder extends Model
{
    //
    use HasFactory;

    protected $primaryKey = 'reminder_id';

    protected $fillable = [
        'task_id',
        'reminder_date',
        'method',
        'status',
    ];

    // Explicitly define the method attribute to avoid conflicts
    protected $attributes = [
        'method' => 'notification',
        'status' => 'pending',
    ];

    protected $casts = [
        'reminder_date' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relasi
    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
