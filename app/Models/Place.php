<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Schedule;


class Place extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'lokasi',
        'image',
    ];

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'schedule_id');
    }
}
