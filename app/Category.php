<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	public static $rules = [
            'name' => 'required|min:3',
            'description' => 'required|max:200'
        ];
        
	protected $fillable=['name','description'];
    //
    public function products(){

    	return $this->hasMany(Product::class);
    	
    }

    public function getFeaturedImageUrlAttribute(){
        $featuredProduct = $this->products()->first();
        return $featuredProduct->featured_image_url;
    }
}
