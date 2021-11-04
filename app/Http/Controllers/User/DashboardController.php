<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transaction;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $year = date('Y');
        $transactionPrice = Transaction::where([
            ['created_at', 'like', "%".$year."%"],
            ['users_id', '=', Auth::user()->id]
        ])->sum('total_price');
        return view('pages.user.dashboard-user', [
            'transactionPrice' => $transactionPrice,
            'year' => $year
        ]);
    }

    public function openStore(Request $request)
    {
        $data = $request->all();
        $data['roles'] = 'STORE';

        $item = Auth::user();
        $userUpdate = User::findOrFail($item->id);

        $userUpdate->update($data);
        return redirect()->route('dashboard');
    }
}
