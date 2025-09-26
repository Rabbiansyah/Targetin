<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'user_id',
        'financial_goal_id',
        'amount',
        'type',
        'category',
        'note',
        'transaction_date',
    ];

    // Relasi
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function financialGoal()
    {
        return $this->belongsTo(FinancialGoal::class);
    }
}
