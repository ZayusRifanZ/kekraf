<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        return view('pages.user.dashboard-user');
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
