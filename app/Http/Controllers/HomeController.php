<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
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
        $categories = Category::take(6)->get();
        $products = Product::with('galleries')->take(12)->latest()->get();
        return view('pages.home', [
            'categories' => $categories,
            'products' => $products
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $getData = Product::where('name', 'like', "%".$search."%")->paginate();

        return dd($getData);
    }
}
