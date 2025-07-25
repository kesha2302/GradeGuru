<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResetPasswordtoken extends Model
{
    protected $table = 'password_reset_tokens';
    protected $primaryKey = 'email';

    protected $fillable = ['email', 'token', 'created_at'];
    public $timestamps = false;
}
