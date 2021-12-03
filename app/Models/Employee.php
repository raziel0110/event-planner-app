<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'type', 'event_id'];

    const PHOTO_TYPE = 'photo';
    const VIDEO_TYPE = 'video';

    const TYPES = [
        self::PHOTO_TYPE => 'photo',
        self::VIDEO_TYPE => 'video'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
