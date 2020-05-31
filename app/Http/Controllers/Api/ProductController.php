<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(){
        /*$products =  Product::select('name','price','stars')->get();
        $products =  Product::paginate(10);
        $count = count($products);

        return response([
           'status' => 'success',
           'count' => $count,
           'data' => $products
        ]);*/
        //return Product::all();
        return ProductResource::collection(Product::all());
    }

    public function show(Product $product){
        return new ProductResource($product);
    }

    public function store(Request $request){

        $rules = [
            'name'=> 'required|max:10',
            'category_id' => 'required|integer',
            'code' => 'required|unique:products',
            'currency_code' =>'required',
            'supplier_id'=>'required|integer',
            'discount'=>'required|integer',
            'short_description'=>'required',
            'details'=>'required',
            'price'=>'required|integer',
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response([
                'status' => 'error',
                'errors'=> $validator->errors()
            ]);
        }

        $product = Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'short_description' => $request->short_description,
            'currency_code' => $request->currency_code,
            'supplier_id' => $request->supplier_id,
            'discount' => $request->discount,
            'details' => $request->details,
            'price' => $request->price,
            'user_id' => '1',
        ]);

        return response([
            'status' => 'success',
            'product' => $product
        ]);

    }

    public function update(Request $request,Product $product){

        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->short_description = $request->short_description;
        $product->currency_code = $request->currency_code;
        $product->supplier_id = $request->supplier_id;
        $product->discount = $request->discount;
        $product->details = $request->details;
        $product->price = $request->price;
        $product->save();

        return response([
            'status'=>'updated',
            'product' => $product
        ]);
    }

    public function destroy(Product $product){
        $product->delete();
        return response([
            'status' => 'deleted',
            'product' => $product
        ]);
    }
}
