<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Regularquestion extends Model
{
     protected $table = 'regularquestions';
     protected $primaryKey = 'rq_id';

     public function classPrice()
    {
        return $this->belongsTo(ClassPrice::class, 'cp_id', 'cp_id');
    }
}
