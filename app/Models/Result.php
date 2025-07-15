<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table = 'results';
    protected $primaryKey = 'result_id';

     protected $fillable = [
        'user_id',
        'cp_id',
        'test_id',
        'result',
        'correct',
    ];

   public function classPrice()
    {
        return $this->belongsTo(ClassPrice::class, 'cp_id', 'cp_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

     public function test()
    {
        return $this->belongsTo(Test::class, 'test_id', 'test_id');
    }

}
