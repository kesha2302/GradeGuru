<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DemoResult extends Model
{
    protected $table = 'demo_results';
    protected $primaryKey = 'demoresult_id';

     public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

     public function demotest()
    {
        return $this->belongsTo(DemoTest::class, 'demo_id', 'demo_id');
    }
}
