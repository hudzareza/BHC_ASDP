<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Contact_us;

class ContactController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        return view('contact.index');
    }

    public function store(Request $request)
    {
        // print_r($_POST);die();
        $request->validate([
            '_token' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|string',
            'content' => 'required|string'
        ]);
        
        $berita = new Contact_us;
        $berita->name = $request->name;
        $berita->email = $request->email;
        $berita->content = $request->content;
        
        $berita->created_at = date("Y-m-d H:i:s");
        // $berita->created_by = Auth::user()->id;

        if ($berita->save()) {
            return redirect()->route('kontak.main')->withSuccess('Succesfully created message');
        } else {
            return back()->withSuccess('Failed created');
        }
    }
    // admin 

    public function cmsList(): View
    {
        $beritas = Contact_us::all();
        // print_r($beritas);die();
        return view('admin.contact.cmsList',  compact('beritas'));
    }

    public function destroy($id)
    {
        // Decrypt article ID
        $decryptedId = decrypt($id);

        // Find article Data
        $berita = Contact_us::findOrFail($decryptedId);

        if ($berita->delete()) {
            return redirect()->route('admin.kontak.kami.main')->withSuccess('Succesfully deleted message');
        } else {
            return back()->withSuccess('Failed deleted message');
        }
    }

    public function lihat($id)
    {
        // Decrypt article ID
        $decryptedId = decrypt($id);

        // Find article Data
        $beritas = Contact_us::findOrFail($decryptedId);
        return view('admin.info.cmsList', compact('beritas'));        
    }

    public function cmsAdd(): View
    {
        return view('admin.contact.cmsAdd');
    }

    public function cmsEdit(): View
    {
        return view('admin.contact.cmsEdit');
    }
}
