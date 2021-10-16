<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardSettingController extends Controller
{
    public function store()
    {
        $user = Auth::user();
        $categories = Category::all();
        return view('pages.dashboard-setting', [
            'user' => $user,
            'categories' => $categories
        ]);
    }
    public function account()
    {
        $user = Auth::user();
        return view('pages.dashboard-account', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, $redirect)
    {
        $data = $request->all();
        $item = Auth::user();
        $userUpdate = User::findOrFail($item->id);

        if ($request->hasFile('profile_photo')){
            $data['profile_photo'] = $request->file('profile_photo')->store('assets/user', 'public');
            if ($item->profile_photo !== 'assets/user/user_default.svg') { 
                Storage::disk('local')->delete('public/'.$item->profile_photo);
            }
        }
        
        $userUpdate->update($data);
        return redirect()->route($redirect)->with('message', 'Data berhasil diubah');
    }
}
