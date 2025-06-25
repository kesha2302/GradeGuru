<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdminRegister extends Model
{
     protected $table = 'adminregister';
     protected $primaryKey = 'admin_id';

     protected $fillable = [
        'name',
        'email',
        'password',
    ];
}
