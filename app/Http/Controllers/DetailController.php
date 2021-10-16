<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\TransactionDetail;
use Illuminate\Support\Facades\Auth;

// use App\TransactionDetail;
class DetailController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request, $id)
    {
        // $total_sold = TransactionDetail::
        //     count('products_id')
        //     ->where('products_id', $products_id)
        //     ->where('shipping_status', 'SUCCESS');

        $product = Product::with(['galleries', 'user'])->where('slug', $id)->firstOrFail();
        $total_sold = TransactionDetail::where([
            ['products_id', $product->id],
            ['shipping_status', 'SUCCESS']])->count();

        // return dd($total_sold);
        return view('pages.detail', [
            'product' => $product, 
            'total_sold' => $total_sold
        ]);
    }

    public function add(Request $request, $id)
    {
        $data = [
            'products_id' => $id,
            'users_id' => Auth::user()->id
        ];

        Cart::create($data);

        return redirect()->route('cart')->with('message', 'Produk berhasil ditambahkan ke keranjang belanja');

    }
}
