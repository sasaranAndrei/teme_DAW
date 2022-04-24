<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendarEvent extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = ['event_start' => 'datetime:Y-m-d', 'event_end' => 'datetime:Y-m-d'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
