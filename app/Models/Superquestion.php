<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Superquestion extends Model
{
     protected $table = 'superquestions';
     protected $primaryKey = 'sq_id';

      public function classPrice()
    {
        return $this->belongsTo(ClassPrice::class, 'cp_id', 'cp_id');
    }

    public function tests()
    {
        return $this->belongsTo(Test::class, 'test_id', 'test_id');
    }
}
