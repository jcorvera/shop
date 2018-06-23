<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class SearchController extends Controller
{
    //
    public function show(Request $request){

    	$query = $request->input('query');
    	$products = Product::where('name','like',"%$query%")->paginate(5);
    	if ($products->count()){
    		$id = $products->first()->id;
    		return redirect("products/$id");
    	}

    	return view('search.show')->with(compact('products','query'));
    }

    //
    public function data(){

    	//pluck devuelve un campo en modo de arreglo
    	$products = Product::pluck('name');
    	return $products;
    }
}
