<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use App\TransactionDetail;
class DetailController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $total_sold = TransactionDetail::
        //     count('products_id')
        //     ->where('products_id', $products_id)
        //     ->where('shipping_status', 'SUCCESS');
        return view('pages.detail');
    }
}
