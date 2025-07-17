<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Regularquestion extends Model
{
    protected $table = 'regularquestions';
    protected $primaryKey = 'rq_id';

    protected $fillable = [
        'cp_id',
        'test_id',
        'question_no',
        'question',
        'option1',
        'option2',
        'option3',
        'option4',
        'answer',
    ];

    public function classPrice()
    {
        return $this->belongsTo(ClassPrice::class, 'cp_id', 'cp_id');
    }

    public function tests()
    {
        return $this->belongsTo(Test::class, 'test_id', 'test_id');
    }
}
