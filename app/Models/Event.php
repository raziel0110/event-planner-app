<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type', 'date', 'location', 'status', 'customer_id'];

    const WEDDING_TYPE     = 'weddings';
    const CHRISTENING_TYPE = 'christening';
    const PARTY_TYPE       = 'party';

    const EVENT_TYPES = [
        self::WEDDING_TYPE,
        self::CHRISTENING_TYPE,
        self::PARTY_TYPE
    ];

    const STATUS_NEW = 'new';
    const STATUS_IN_PROGRESS = 'in_progress';
    const STATUS_DONE = 'done';

    const STATUSES = [
        self::STATUS_NEW,
        self::STATUS_IN_PROGRESS,
        self::STATUS_DONE
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
