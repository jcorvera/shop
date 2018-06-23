<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    public function details(){
    	return $this->hasMany(CartDetail::class);
    }
    public function getTotalAttribute(){
    	$total =0;
    	foreach ($this->details as $key => $details) {
    		$total += $details->product->price * $details->quantity;
    	}
    	return $total;
    }
}
