<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function update(Request $Request){
    	$cart = auth()->user()->cart;
    	$cart->status='pending';
    	$cart->save();

    	$notification ="Tu pedido se ha realizado correctamente , te contactaremos pronto via email";

    	return back()->with(compact('notification'));
    }
}
