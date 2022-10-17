<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use function League\Flysystem\Local\move;

class ProductController extends Controller
{
    public function addProduct(){
        return view('admin.products.add-product');
    }

    public function saveProduct(Request $request){
       $product = new Product();

       $product->product_name = $request->product_name;
       $product->category_name = $request->category_name;
       $product->brand_name = $request->brand_name;
       $product->product_price = $request->product_price;
       $product->product_description = $request->product_description;
       $product->product_image = $this->saveImage($request);
       $product->save();

       return back();

    }

    private function saveImage($res){
        $image = $res->file('product_image');
        $imageName = rand().'.'.$image->getClientOriginalName();
        $directory = 'adminAssets/assets/upload-image/';
        $imageUrl = $directory.$imageName;
        $image -> move($directory,$imageName);
        return $imageUrl;

    }

    public function manageProduct(){
        return view('admin.products.manage-product',[
            'products' => Product::all()
        ]);
    }

    public function editProduct($id){
        return view('admin.products.edit-product',[
            'products' => Product::find($id)
        ]);
    }

    public function updateProduct(Request $request){
        $product = Product::find($request->product_id);

        $product->product_name = $request->product_name;
        $product->category_name = $request->category_name;
        $product->brand_name = $request->brand_name;
        $product->product_price = $request->product_price;
        $product->product_description = $request->product_description;

        if ($request->file('product_image')){
            unlink($product->product_image) ;
            $product->product_image = $this->saveImage($request);
        }

        $product->save();

        return redirect('/manage-product');

    }

    public function deleteProduct(Request $request){

        $product = Product::find($request->product_id);
        unlink($product->product_image);
        $product->delete();
        return back();
    }

    public function statusProduct($id){
        $product = Product::find($id);

        if ($product->status == 1){
            $product->status = 0;
            $product->save();
            return back();
        }else{
            $product->status = 1;
            $product->save();
            return back();
        }
    }

}
