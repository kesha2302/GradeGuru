<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $table = 'inquiry';
    protected $primaryKey = 'inquiry_id';

    protected $fillable = ['name', 'email', 'message'];
}
