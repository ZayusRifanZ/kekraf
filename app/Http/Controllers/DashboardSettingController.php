<?php

namespace App\Http\Controllers;

use App\Category;
use App\Models\Province;
use App\Models\Regency;
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
        return view('pages.store.dashboard-setting', [
            'user' => $user,
            'categories' => $categories
        ]);
    }
    public function account()
    {
        $user = Auth::user();
        $province_name = Province::find($user->provinces_id)->name;
        $regency_name = Regency::find($user->regencies_id)->name;
       
        return view('pages.store.dashboard-account', [
            'user' => $user,
            'province_name' => $province_name,
            'regency_name' => $regency_name,
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
