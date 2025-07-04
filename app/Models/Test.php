<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $table = 'test';
     protected $primaryKey = 'test_id';

 
     public function classPrice()
    {
        return $this->belongsTo(ClassPrice::class, 'cp_id');
    }
}
