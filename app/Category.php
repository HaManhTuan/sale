<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     protected $table='category';
     public function categories(){
    	return $this->hasMany('App\Category','parent_id');
    }
}
