<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking';
    protected $primaryKey = 'booking_id';

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
