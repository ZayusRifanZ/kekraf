<?php

namespace App\Http\Controllers;

use App\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardTransactionController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sellTransactions = TransactionDetail::with('transaction.user', 'product.galleries')
            ->whereHas('product', function($product){
                $product->where('users_id', Auth::user()->id);
            })->get();

        $buyTransactions = TransactionDetail::with('transaction.user', 'product.galleries')
            ->whereHas('transaction', function($transaction){
                $transaction->where('users_id', Auth::user()->id);
            })->get();
        return view('pages.store.dashboard-transaction',[
            'sellTransactions' => $sellTransactions,
            'buyTransactions' => $buyTransactions
        ]);
    }

    public function details(Request $request, $id)
    {
        $transaction = TransactionDetail::with('transaction.user', 'product.galleries')
            ->findOrFail($id);
        return view('pages.store.dashboard-transaction-details', [
            'transaction' => $transaction
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $item = TransactionDetail::findOrFail($id);

        $item->update($data);

        return 
            redirect()
            ->route('dashboard-transaction-detail', $id)
            ->with('message', 'Status pengiriman diubah');
    }
}
