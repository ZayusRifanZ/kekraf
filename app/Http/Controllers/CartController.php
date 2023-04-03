<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Courier;
use App\Models\Regency;
use App\Models\Province;
use DOMDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Kavist\RajaOngkir\Facades\RajaOngkir;

class CartController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $carts = Cart::with(['product.galleries', 'product.user'])
            ->where('users_id', Auth::user()->id)
            ->get();
        $user = Auth::user();
        $province = Province::find($user->provinces_id)->name;
        $city = Regency::find($user->regencies_id)->name;
        $addres_detail = 
            $user->address_one. ', '.
            $user->address_two. ', '. 
            $city. ', '.
            $province. ', '.
            $user->country;
        // $echo_br =
        //  echo ("<br>");
        $couriers = Courier::all();

        $arr = [];
        foreach ($carts as $key => $cart) {
            $arr[] = $cart->product->user->store_name;
        }
        // dd($arr);
        // dd(array_count_values($arr));
        // dump(array_unique($arr));
        $count_store = count(array_count_values($arr));
        $store_name_arr = array_unique($arr);
        // dd($count_store);

        // foreach ($store_name_arr as $key => $data) { 
        //     foreach ($carts as $cart) {
        //         if ($cart->product->user->store_name === $data) {
        //             dump($cart->product->name.'<br>');
        //         }
        //     }
        //     dump('hhhhhhhhh');
        // } die;

        // $cekongkir = RajaOngkir::ongkosKirim([
        //     'origin'        => Regency::find($request->input('locations_origin')),     // ID kota/kabupaten asal
        //     'destination'   => Regency::find(Auth::user()->regencies_id)->id_rj_ongkir,      // ID kota/kabupaten tujuan
        //     'weight'        => 1300,    // berat barang dalam gram
        //     'courier'       => 'jne'    // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
        // ])->get()[0];
        // dd($daftarProvinsi);
        if (isset($request->kurir)) {
            dd('hai berhasil', $request->kurir);
        }
        // $tes = new DOMDocument();
        // dd($tes);
        
        return view('pages.cart', [
            'carts' => $carts,
            'store_name_arr' => $store_name_arr,
            'count_store' => $count_store,
            'user' => $user,
            'provinsi' => $province,
            'city' => $city,
            'addres_detail' => $addres_detail,
            'couriers' => $couriers
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

    public function coba()
    {
        $city = Regency::all();
        $daftarProvinsi = RajaOngkir::ongkosKirim([
            'origin'        => 155,     // ID kota/kabupaten asal
            'destination'   => 80,      // ID kota/kabupaten tujuan
            'weight'        => 1300,    // berat barang dalam gram
            'courier'       => 'jne'    // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
        ]);
        // dd($daftarProvinsi);
        return view('pages.tesaja', [
            'city' => $city,
        ]);
    }
    public function cobapost(Request $request){
        $data = $request->all();
        $select = $request->input('select');
        dd($data, $select);
    }
}
