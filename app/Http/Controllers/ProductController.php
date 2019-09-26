<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = auth()->user()->products;
        return view("product.index", ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("product.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = $request->file('image')->store('public/avatarss');

        Product::create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'body' => $request->body,
            'price' => $request->price,
            'category' => $request->category,
            'image_path' => $path

        ]);


        return redirect('/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view("product.show", [ 'product' => $product ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        return view('product.edit', [ 'product' => $product]);
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
        if(!is_null($request->image)){
            $path = $request->file('image')->store('public/avatarss');
        }

        $post = Product::find($id);
        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'price' => $request->price,
            'category' => $request->category,
            'status' => $request->status,
            'image_path' => $request->image != null ? $path : $post->image_path,
        ]);

        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();

        return redirect('/product');
    }

    public function search()
    {
        $products = Product::query();


        if(request()->has('category')){
            $products = $products->where('category', request()->category);
        }

        if(request()->has('search')){
            $products = $products->where('title', 'LIKE', "%".request()->search."%");
        }

        $products = $products->latest()->paginate(4);
        
        return view('welcome', ['products' => $products]);
    }
}
