<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Illuminate\View\View;

class RoleController extends Controller
{
    public function list(Request $request)
    {
        $beritas = Role::all()->sortByDesc('id');

        return view('admin.role.list', compact('beritas'));
    }

    public function cmsAdd()
    {
        //
        return view('admin.role.add');
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
            'desc' => 'required|string'
        ]);
        
        $berita = new Role;
        $berita->name = $request->name;
        $berita->desc = $request->desc;
        
        $berita->created_at = date("Y-m-d H:i:s");
        // $berita->created_by = Auth::user()->id;

        if ($berita->save()) {
            return redirect()->route('admin.list.role')->withSuccess('Succesfully created');
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
        $berita = Role::findOrFail($decryptedId);
        // print_r($berita);die();

        return view('admin.role.edit', compact('berita'));
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
        $berita = Role::findOrFail($decryptedId);
        
        $request->validate([
            '_token' => 'required|string',
            'name' => 'required|string',
            'desc' => 'required|string'
        ]);
        
        $berita->name = $request->name;
        $berita->desc = $request->desc;
        $berita->updated_at = date("Y-m-d H:i:s");
        // $berita->created_by = Auth::user()->id;

        if ($berita->update()) {
            return redirect()->route('admin.list.role')->withSuccess('Succesfully updated');
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
        $berita = Role::findOrFail($decryptedId);

        if ($berita->delete()) {
            return redirect()->route('admin.list.role')->withSuccess('Succesfully deleted');
        } else {
            return back()->withSuccess('Failed deleted');
        }
    }
}
