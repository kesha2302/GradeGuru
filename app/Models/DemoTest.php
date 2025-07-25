<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DemoTest extends Model
{
    protected $table = 'demo_tests';
    protected $primaryKey = 'demo_id';

    protected $fillable = ['class_id', 'title', 'time', 'pass_marks'];

    public function classNames()
    {
        return $this->belongsTo(ClassName::class, 'class_id', 'class_id');
    }
}
