<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassName extends Model
{
     use SoftDeletes;

     protected $table = 'class_names';
     protected $primaryKey = 'class_id';

}
