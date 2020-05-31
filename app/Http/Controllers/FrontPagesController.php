<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Product;
use Carbon\Carbon;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontPagesController extends Controller
{


    public function index(Request $request)
    {
        $products = Product::limit(6)->get();
        $feature_product = Product::orderBy('stars','desc')->limit(1)->first();
        return view('home',compact('products','feature_product'));
    }

    public function products()
    {
        $products = Product::paginate(15);
        $categories = Category::all();
        //dd($products);
        return view('products',compact('products','categories'));
    }

    public function productDetails(Product $product)
    {

        //$product = Product::find($id);
        //dd($product);
        $similar_products = Product::where('category_id',$product->category_id)
            ->where('id','<>',$product->id)->limit(6)->get();

        //dd($product->comments->toArray());
        return view('product_details', compact('product','similar_products'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function about()
    {
        return view('about');
    }

    public function comments(Request $request, $id)
    {
        dd($id);
        //dd($request->toArray());

        $comment = Comment::create([
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment,
            'product_id' => $id
        ]);

        dd($comment);
        return redirect()->back();
    }
}
