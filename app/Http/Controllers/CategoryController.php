<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    //
    public  function show(Category $category){
    	$products = $category->products()->paginate();
    	return view('categories.show')->with(compact('category','products'));
    }
}
