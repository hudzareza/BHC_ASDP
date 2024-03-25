<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function list(Request $request)
    {
        $beritas = User::paginate(10);

        return view('admin.user.list', compact('beritas'));
    }

    public function cmsAdd()
    {
        $data = Role::all();
        $role = json_decode(json_encode($data), true);
        
        return view('admin.user.add' , compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            '_token' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|string',
            'role' => 'required|string',
            'password' => 'required|string',
            'phone_number' => 'required|string'
        ]);
        
        $berita = new User;
        $berita->name = $request->name;
        $berita->email = $request->email;
        $berita->phone_number = $request->phone_number;
        $berita->role = $request->role;
        $berita->password = Hash::make($request->password);
        
        $berita->created_at = date("Y-m-d H:i:s");
        // $berita->created_by = Auth::user()->id;
        // $berita->created_by = '';
        // $berita->updated_by = '';

        if ($berita->save()) {
            return redirect()->route('admin.list.user')->withSuccess('Succesfully created');
        } else {
            return back()->withSuccess('Failed created');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cmsEdit($id)
    {
        // Decrypt aryicle ID
        $decryptedId = decrypt($id);

        // Find article Data
        $berita = User::findOrFail($decryptedId);
        $data = Role::all();
        $role = json_decode(json_encode($data), true);

        // print_r($berita);die();

        return view('admin.user.edit', compact('berita','role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Decrypt article ID
        $decryptedId = decrypt($id);

        // Find article Data
        $berita = User::findOrFail($decryptedId);
        
        $request->validate([
            '_token' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|string',
            'role' => 'required|string',
            // 'password' => 'required|string',
            'phone_number' => 'required|string'
        ]);
        
        $berita->name = $request->name;
        $berita->email = $request->email;
        $berita->phone_number = $request->phone_number;
        $berita->role = $request->role;

        
        if (empty($request->password)) {
            $berita->password = $berita->password;
        }else {
            $berita->password = Hash::make($request->password);    
        }
        
        $berita->updated_at = date("Y-m-d H:i:s");
        // $berita->created_by = Auth::user()->id;

        if ($berita->update()) {
            return redirect()->route('admin.list.user')->withSuccess('Succesfully updated');
        } else {
            return back()->withSuccess('Failed updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Decrypt article ID
        $decryptedId = decrypt($id);

        // Find article Data
        $berita = User::findOrFail($decryptedId);

        if ($berita->delete()) {
            return redirect()->route('admin.user.list')->withSuccess('Succesfully deleted');
        } else {
            return back()->withSuccess('Failed deleted');
        }
    }

    
}
