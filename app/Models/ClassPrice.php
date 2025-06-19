<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassPrice extends Model
{
    use SoftDeletes;

      protected $table = 'class_prices';
      protected $primaryKey = 'cp_id';

}
