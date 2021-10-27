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
        $filter = $request->filter;

        if (isset($search)){
            if ($filter == 0 || $filter == null){
                $products = Product::where('name', 'like', "%".$search."%")->paginate(12);
            }
            elseif ($filter == 1) {
                $products = Product::where('name', 'like', "%".$search."%")->latest()->paginate(12);
            }
            elseif ($filter == 2) {
                $products = Product::where('name', 'like', "%".$search."%")->orderBy('price', 'desc')->paginate(12);
            }
            elseif ($filter == 3) {
                $products = Product::where('name', 'like', "%".$search."%")->orderBy('price', 'asc')->paginate(12);
            }
        }else {
            // return dd([$search, $filter]);
            // return redirect()->route('home');
        }


        // return dd($products);
        return view('pages.search-product', [
            'products' => $products,
            'search' => $search,
            'filter' => $filter
        ]);
    }
    public function searchSelect(Request $request)
    {
        $select = $request->filter;

        return dd($select);
    }

    public function storeProduct(Request $request, $id)
    {
        $products = Product::with(['galleries', 'user'])->where('users_id', $id)->paginate(12);
        // return dd($products);
        return view('pages.store-product', [
            'products' => $products
        ]);
    }
}
