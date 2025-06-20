<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aboutus extends Model
{
     protected $table = 'aboutus';
     protected $primaryKey = 'about_id';

      protected $fillable = ['title', 'description1', 'description2'];
}
