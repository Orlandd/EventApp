<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Schedule;



class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'user_id',
        'schedule_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function schedules()
    {
        return $this->belongsTo(Schedule::class, 'schedule_id');
    }
}
