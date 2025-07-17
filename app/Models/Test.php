<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $table = 'test';
    protected $primaryKey = 'test_id';

    protected $fillable = [
        'cp_id',
        'title',
        'que_type',
        'time',
        'pass_marks',
    ];

    public function classPrice()
    {
        return $this->belongsTo(ClassPrice::class, 'cp_id');
    }

    public function superQuestions()
    {
        return $this->hasMany(Superquestion::class, 'test_id');
    }

    public function regularQuestions()
    {
        return $this->hasMany(Regularquestion::class, 'test_id');
    }
}
