<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DemoQuestion extends Model
{
    protected $table = 'demo_questions';
    protected $primaryKey = 'demoque_id';

    protected $fillable = ['demo_id', 'question_no', 'question', 'option1', 'option2', 'option3', 'option4', 'answer'];

    public function demotest()
    {
        return $this->belongsTo(DemoTest::class, 'demo_id', 'demo_id');
    }
}
