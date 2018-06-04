<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use File;
class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $product = Product::find($id);
        $images = $product->images()->orderBy('featured','DESC')->get();
        return view('admin.products.images.index')->with(compact('product','images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        //Guardar la imagen en nuestro proyecto

        $file = $request->file('foto');
        $path = public_path().'/images/products';
        $filename = uniqid().$file->getClientOriginalName();
        $moved = $file->move($path,$filename);
        //si la imagen fue guardada almacenamos la referncia en la bd
        if ($moved) {
            // crear un registro en la tabla product_images
            $ProductImage = new ProductImage();
            $ProductImage->image = $filename;
            $ProductImage->product_id=$id;
            $ProductImage->save();
        }
        

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //elimminamos el archivo
        $ProductImage = ProductImage::find($request->input('id'));

        if (substr($ProductImage->image, 0,4) === "http") {
            $deleted = true;
        }else{
            $fullPath = public_path().'/images/products/'.$ProductImage->image;
            $deleted= File::delete($fullPath);
            
        }

        if ($deleted) {

            $ProductImage->delete();
        }

        return back();

    }
    //Destacar imagen

    public function select($idProduct,$idImage){

        ProductImage::where('product_id',$idProduct)->update([
            'featured'=>false
        ]);

        $ProductImage = ProductImage::find($idImage);
        $ProductImage->featured = true;
        $ProductImage->save();

        return back();
    }
}
