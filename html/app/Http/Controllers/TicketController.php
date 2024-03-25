<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Illuminate\View\View;

class TicketController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        return view('ticket.index');
    }
    
    public function soon(): View
    {
        return view('ticket.soon');
    }

    // admin

    public function cmsList(): View
    {
        $beritas = Ticket::all()->sortByDesc('id');

        return view('admin.ticket.cmsList', compact('beritas'));
    }

    public function cmsAdd(): View
    {
        return view('admin.ticket.cmsAdd');
    }

    public function store(Request $request)
    {
        $request->validate([
            '_token' => 'required|string',
            'photo' => 'required',
            'name' => 'required|string',
            'url' => 'required|string'
        ]);
        
        $image_parts = explode(";base64,", $request->photo);
        $image_type_aux = explode("image/", $image_parts[0]);
        
        $image_type = $image_type_aux[1];
        $extension = $image_type;
        $fileName = time() . rand() .'.' . $extension;

        Image::make($request->photo)->resize(60, 60)->save(public_path() .'/images/article/ticket/'. $fileName);

        // $fileName = time() . '.' . $request->photo->extension();
        // $request->photo->move(public_path() .'/images/article/', $fileName);
        
        $berita = new Ticket;
        $berita->name = $request->name;
        $berita->url = $request->url;
        $berita->photo = $fileName;
        $berita->approved = $request->status;
        $berita->created_at = date("Y-m-d H:i:s");
        // $berita->is_front = $request->is_front;
        // $berita->created_by = Auth::user()->id;

        if ($berita->save()) {
            return redirect()->route('admin.list.artikel.tiket')->withSuccess('Succesfully created ticket');
        } else {
            return back()->withSuccess('Failed created ticket');
        }
    }

    public function cmsEdit($id): View
    {
        // Decrypt aryicle ID
        $decryptedId = decrypt($id);

        // Find article Data
        $berita = Ticket::findOrFail($decryptedId);
        return view('admin.ticket.cmsEdit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        // Decrypt article ID
        $decryptedId = decrypt($id);

        // Find article Data
        $berita = Ticket::findOrFail($decryptedId);

            
        $request->validate([
            '_token' => 'required|string',
            'name' => 'required|string',
            'url' => 'required|string'
        ]);
        

        if (empty($request->photo)) {
            $berita->photo = $request->exist;
        }else {
            $image_parts = explode(";base64,", $request->photo);
            $image_type_aux = explode("image/", $image_parts[0]);
            
            $image_type = $image_type_aux[1];
            $extension = $image_type;
            $fileName = time() . rand() .'.' . $extension;
            Image::make($request->photo)->resize(60, 60)->save(public_path() .'/images/article/ticket/'. $fileName);    
            
            $berita->photo = $fileName;
        }
        
        
        $berita->name = $request->name;
        $berita->url = $request->url;
        $berita->approved = $request->status;
        $berita->updated_at = date("Y-m-d H:i:s");
        // $berita->created_by = Auth::user()->id;

        if ($berita->update()) {
            return redirect()->route('admin.list.artikel.tiket')->withSuccess('Succesfully updated ticket');
        } else {
            return back()->withSuccess('Failed updated ticket');
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
        $berita = Ticket::findOrFail($decryptedId);

        if ($berita->delete()) {
            return redirect()->route('admin.list.artikel.tiket')->withSuccess('Succesfully deleted');
        } else {
            return back()->withSuccess('Failed deleted Article');
        }
    }

    
    public function changeStatus(Request $request, $id, $params)
    {
        // print_r($params);die();
    
        $decryptedId = decrypt($id);
        
        $berita = Ticket::find($decryptedId);
        $berita->approved = $params;

        if ($berita->update()) {
            return redirect()->route('admin.list.artikel.tiket')->withSuccess('Succesfully change status');
        } else {
            return back()->withSuccess('Failed deleted Article');
        }
    }
}
