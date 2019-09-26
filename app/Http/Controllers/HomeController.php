<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::query();


        if(request()->has('category')){
            $products = $products->where('category', request()->category);
        }

        $products = $products->latest()->paginate(4);

        return view('welcome', ['products' => $products]);
    }
}
