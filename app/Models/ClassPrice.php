<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassPrice extends Model
{
    use SoftDeletes;

    protected $table = 'class_prices';
    protected $primaryKey = 'cp_id';

    protected $fillable = ['class_id', 'title', 'feature', 'price'];

    public function classNames()
    {
        return $this->belongsTo(ClassName::class, 'class_id', 'class_id');
    }
    public function tests()
    {
        return $this->hasMany(Test::class, 'cp_id');
    }
}
