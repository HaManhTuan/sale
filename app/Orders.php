<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    public function orders()
    {
    	return $this->hasMany('App\OrderDetails','order_id');
    }
    public static function getOrderDetails($order_id)
    {
    	$getOrderDetails=Orders::where('id',$order_id)->first();
    	return $getOrderDetails;
    }
}
