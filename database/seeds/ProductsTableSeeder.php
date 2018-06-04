<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Category;
use App\ProductImage;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // //
        // factory(Category::class,5)->create();
        // factory(Product::class,100)->create();
        // factory(ProductImage::class,200)->create();

        $categoria = factory(Category::class,4)->create();
        $categoria->each(function($category){
            $products = factory(Product::class,5)->make();
            $category->products()->saveMany($products);

            $products->each(function($p){
                $images = factory(ProductImage::class,3)->make();
                $p->images()->saveMany($images);
            });
        });

    }
}
