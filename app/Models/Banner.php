<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
     use SoftDeletes;

      protected $table = 'banners';
      protected $primaryKey = 'banner_id';

        protected $fillable = ['title', 'description', 'image'];

        public $timestamps = false;    
}
