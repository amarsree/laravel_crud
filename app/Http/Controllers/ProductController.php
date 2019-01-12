<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

     $image = $request->file('img');

    $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

    $destinationPath = public_path('/images');

    $image->move($destinationPath, $input['imagename']);

         $user=Product::create([
            'product_name' => $request->product_name,
            'amount' => $request->amount,
            'Description' => $request->description,
            "img" => $input['imagename']
        ]);

       return redirect('product')->with('message', 'product added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
    
        return view("products.update", compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
      $image = $request->file('img');

    $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

    $destinationPath = public_path('/images');

    $image->move($destinationPath, $input['imagename']);


          Product::where('id', $product->id)->update([
        'product_name'=> $request->product_name,
        'Description'=> $request->description,
        'amount'=> $request->amount,
        "img" => $input['imagename']
    ]);

          return redirect('product')->with('message', 'product updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
           $product->where('id',$product->id)->delete();
           
          return redirect('product')->with('message', 'product deleted');
    }



}
