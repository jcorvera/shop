<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\Mail;
use App\Mail\NewOrder;
class CartController extends Controller
{
    //
    public function update(Request $Request){
    	$client = auth()->user();

    	$cart = auth()->user()->cart;
    	$cart->status='pending';
    	$cart->order_date = Carbon::now();
    	$cart->save();
    	$admins = User::where('admin',true)->get();

    	Mail::to($admins)->send( new NewOrder($client , $cart));

    	$notification ="Tu pedido se ha realizado correctamente , te contactaremos pronto via email";

    	return back()->with(compact('notification'));
    }
}
