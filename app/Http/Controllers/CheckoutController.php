<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Cart;
use App\Transaction;
use App\TransactionDetail;

use Exception;

use Midtrans\Snap;
use Midtrans\Config;
use Midtrans\Notification;

class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        //save users data
        $user = Auth::user();
        $user->update($request->except('total_price'));

        // Process checkout
        $code = 'KEKRAF-' . mt_rand(0000,9999);
        $carts = Cart::with(['product', 'user'])
            ->where('users_id', Auth::user()->id)
            ->get();

        // Transaction Create
        $transaction = Transaction::create([
            'users_id' => Auth::user()->id,
            'insurace_price' => 0,
            'shipping_price' => 0,
            'total_price' => $request->total_price,
            'transactions_status' => 'PENDING',
            'code' => $code

        ]);

        foreach ($carts as $cart) {
            $trx = 'TRX-' . mt_rand(0000,9999);
            
            TransactionDetail::create([
                'transactions_id' => $transaction->id,
                'products_id' => $cart->product->id,
                'price' => $cart->product->price,
                'shipping_status' => 'PENDING',
                'resi' => '',
                'code' => $trx
            ]);
        }

        // dd() in php means is dump and die
        // return dd($transaction);

        // delete cart data
        Cart::with('product', 'user')
            ->where('users_id', Auth::user()->id)
            ->delete();

        // konfigurasi midtrans
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');
        
        // Buat array untuk dikirim ke midtrans
        // enabled_payments = ['bca_va', 'bni_va', 'bri_va', 'other_va',]
        $midtrans = [
            'transaction_details' => [
                'order_id' => $code,
                'gross_amount' => (int) $request->total_price
            ],

            'customer_details' => [
                'first_name' => Auth::user()->name, 
                'email' => Auth::user()->email,

            ],

            'enabled_payments' => [
                'gopay', 'permata_va',  'bank_transfer'
            ],

            'vtweb' => [],
        ];

        try {
            // Get Snap Payment Page URL
            $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;
            
            // Redirect to Snap Payment Page
            // header('Location: ' . $paymentUrl);
            return redirect($paymentUrl);
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function callback(Request $request)
    {
        // Set konfigurasi midtrans
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');
        
        // Instance Midtrans Nontification
        $notification = New Notification();

        // Assign ke variable untuk memudahkan koding
        $status = $notification->transactions_status;
        $type = $notification->payment_type;
        $fraud = $notification->fraud_status;
        $orderId = $notification->order_id;
        
        // Cari transaksi berdasarkan ID
        $transaction = Transaction::findOrFail($orderId);

        // Handle nontification status
        if($status == 'capture'){
            if($type == 'credit_card'){
                if($fraud == 'challenge'){
                    $transaction->status = 'PENDING';
                }
                else {
                    $transaction->status = 'SUCCESS';
                }
            }
        }
        
        else if ($status == 'settlement'){
            $transaction->status = 'SUCCESS';
        }

        else if ($status == 'pending'){
            $transaction->status = 'PENDING';
        }

        else if ($status == 'deny'){
            $transaction->status = 'CANCELLED';
        }

        else if ($status == 'expired'){
            $transaction->status = 'CANCELLED';
        }

        else if ($status == 'cancel'){
            $transaction->status = 'CANCELLED';
        }

        // Simpan transaksi
        $transaction->save();

        // Kirimkan email
        if ($transaction)
        {
            if($status == 'capture' && $fraud == 'accept' )
            {
                //
            }
            else if ($status == 'settlement')
            {
                //
            }
            else if ($status == 'success')
            {
                //
            }
            else if($status == 'capture' && $fraud == 'challenge' )
            {
                return response()->json([
                    'meta' => [
                        'code' => 200,
                        'message' => 'Midtrans Payment Challenge'
                    ]
                ]);
            }
            else
            {
                return response()->json([
                    'meta' => [
                        'code' => 200,
                        'message' => 'Midtrans Payment not Settlement'
                    ]
                ]);
            }

            return response()->json([
                'meta' => [
                    'code' => 200,
                    'message' => 'Midtrans Notification Success'
                ]
            ]);
        }
        
    }
}
