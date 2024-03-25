<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function __construct()
    {
        // $this->middleware(['role:SuperAdmin|Admin', 'permission:announcement_show|announcement_create|announcement_update|announcement_detail|announcement_delete']);
    }

    public function index(): View
    {
        return view('profile.index');
    }

    public function infostore(Request $request)
    {
        $decryptedId = decrypt($request->id);
        
        $berita = User::findOrFail($decryptedId);

        $berita->name = $request->name;
        $berita->phone_number = $request->phone_number;
        $berita->email = $request->email;
        $berita->created_at = date("Y-m-d H:i:s");
        // $berita->created_by = Auth::user()->name;

        if ($berita->update()) {
            return redirect()->back()->with('success', 'Succesfully edit profile!');
        } else {
            return redirect()->back()->with('error', 'Failed edit profile!');
        }
    }

    public function reset(): View
    {
        return view('profile.reset');
    }

    public function passstore(Request $request)
    {
        
        $decryptedId = decrypt($request->id);
        
        $berita = User::findOrFail($decryptedId);

        // $old_password = Hash::make($request->password);

        if (Hash::check($request->password, $berita->password)) {
            if($request->password_confirmation != $request->new_password){
                return redirect()->back()->with('error', 'Confirmation password not same!');
            }else{
                $request->validate([
                    '_token' => 'required|string',
                    'password' => 'required|min:8',
                    'new_password' => 'required|min:8'
                ]);
        
                $berita->password = Hash::make($request->new_password);
                $berita->created_at = date("Y-m-d H:i:s");
                // $berita->created_by = Auth::user()->name;
                if ($berita->update()) {
                    return redirect()->back()->with('success', 'Succesfully edit password!');
                } else {
                    return redirect()->back()->with('error', 'Failed edit password!');
                }
            }
        }else {
            return redirect()->back()->with('error', "The old password doesn't match!");   
        }
        
    }
}
