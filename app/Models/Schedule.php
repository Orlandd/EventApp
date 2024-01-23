<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Event;
use App\Models\Ticket;
use App\Models\Place;


class Schedule extends Model
{
    use HasFactory;

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'ticket_id');
    }

    public function events()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function places()
    {
        return $this->belongsTo(Place::class, 'place_id');
    }
}
