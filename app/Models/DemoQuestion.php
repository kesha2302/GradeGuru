<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DemoQuestion extends Model
{
    protected $table = 'demo_questions';
    protected $primaryKey = 'demoque_id';

        public function demotest()
    {
        return $this->belongsTo(DemoTest::class, 'demo_id', 'demo_id');
    }
}
