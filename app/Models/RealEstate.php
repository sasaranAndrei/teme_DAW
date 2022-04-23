<?php

namespace App\Models;

use App\Enum\RealEstatePropertyTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealEstate extends Model
{
    use HasFactory;

    protected $fillable = ['property_type', 'address', 'area', 'floor'];

    public static $PROPERTY_TYPES = ['apartment', 'single_room', 'home', 'commercial_space'];

    public function bookings()
    {
        return $this->hasMany(CalendarEvent::class);
    }
}
