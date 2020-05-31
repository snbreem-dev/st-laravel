<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Currency;
use App\Http\Controllers\Controller;
use App\Product;
use App\Scopes\ProductScope;
use App\Supplier;
use App\Transactions;
use Carbon\Carbon;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(15);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $currency = Currency::all();
        $suppliers = Supplier::all();
        return view('admin.products.create',compact('categories','currency','suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /*$request->validate([
            'name'=> 'required|max:10',
            'category_id' => 'required|integer',
            'code' => 'required|unique:products',
            'currency_code' =>'required',
            'supplier_id'=>'required|integer',
            'discount'=>'required|integer',
            'short_description'=>'required',
            'details'=>'required',
            'price'=>'required|integer',
        ]);*/

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

        $messages = [
            'name.required' =>'you should enter product name',
            'name.max' => 'product name should not be greater than 10 characters',
            'code.unique' => 'Product code should not be duplicated'
        ];

        $validator = Validator::make($request->all(),$rules, $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        //dd($request->all());

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

        $file = $request->file('cover_image');
        $fileName = time().'.'.$file->extension();
        $file->move('product_images',$fileName);

        $product->cover_image = $fileName;
        $product->save();

        return redirect()->route('admin.products.index')->with('success','Product saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        $categories = Category::all();
        $currency = Currency::all();
        $suppliers = Supplier::all();
        return view('admin.products.edit',compact('product','categories','currency','suppliers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->short_description = $request->short_description;
        $product->currency_code = $request->currency_code;
        $product->supplier_id = $request->supplier_id;
        $product->discount = $request->discount;
        $product->details = $request->details;
        $product->price = $request->price;
        $product->save();

        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index');
    }
}
