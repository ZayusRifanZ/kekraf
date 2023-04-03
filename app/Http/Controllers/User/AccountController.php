<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Province;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // $province_data = Province::find('id', $user->provinces_id);
        return view('pages.user.account.index', [
            'user' => $user,
        ]);
        // dd($province_data);
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
