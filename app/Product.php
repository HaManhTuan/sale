<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table='product';
    public function attributes(){
    	return $this->hasMany('App\ProductAttributes','product_id');
    }
     public function category()
    {
    	return $this->belongsTo('App\Category','category_id','id');
    }
}
