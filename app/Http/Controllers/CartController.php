<?php

namespace App\Http\Controllers;

use App\Cart;

use App\Models\Regency;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $carts = Cart::with(['product.galleries', 'product.user'])
            ->where('users_id', Auth::user()->id)
            ->get();

        $arr = [];
        foreach ($carts as $key => $cart) {
            $arr[$key] = $cart->product->user->store_name;
        }
        // dump(array_count_values($arr));
        // dump(array_unique($arr));
        $count_store = count(array_count_values($arr));
        $store_name_arr = array_unique($arr);

        // for ($i=0; $i < $count_store; $i++) { 
        //     foreach ($carts as $cart) {
        //         if ($cart->product->user->store_name === $store_name_arr[$i]) {
        //             dump($cart->product->name.'<br>');
        //         }
        //     }
        //     dump('hhhhhhhhh');
        // }

        
        return view('pages.cart', [
            'carts' => $carts,
            'store_name_arr' => $store_name_arr,
            'count_store' => $count_store
        ]);
    }

    public function delete(Request $request, $id) {
        $carts = Cart::findOrFail($id);
        $carts->delete();

        return redirect()->route('cart')->with('message', 'berhasil menghapus daftar keranjang');
    }

    public function success(){
        return view('pages.success');
    }

    function coba()
    {
        return 'hai nama ku zayus ';
    }
}
