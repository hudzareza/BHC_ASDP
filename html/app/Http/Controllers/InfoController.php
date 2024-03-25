<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Info;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class InfoController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        $beritas = DB::table('infos')
        ->where('approved','=',"1")
        ->latest()->take(6)->get();

        return view('info.index', compact('beritas'));
    }

    public function detail($id): View
    {
        // print_r($id);die();
        $data = DB::table('infos')
        ->where('id','=',$id)->get();
        // print_r($data);die();
        // print_r($photo);die();
        $beritas = Info::where('approved','=','1')->latest()->paginate(4);
        return view('info.detail', compact('data','beritas'));
    }

    // admin 

    public function cmslist()
    {
        //
        $beritas = Info::all()->sortByDesc('id');

        return view('admin.info.cmsList', compact('beritas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cmsAdd()
    {
        //
        return view('admin.info.cmsAdd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // print_r($_POST);die();
        $request->validate([
            // '_token' => 'required|string',
            'photo' => 'required',
            'title' => 'required|string',
            'description' => 'required|string',
            'content' => 'required|string'
        ]);
        
        $image_parts = explode(";base64,", $request->photo);
        $image_type_aux = explode("image/", $image_parts[0]);
        
        $image_type = $image_type_aux[1];
        $extension = $image_type;
        $fileName = time() . rand() .'.' . $extension;

        Image::make($request->photo)->resize(1920, 1200)->save(public_path() .'/images/article/'. $fileName);

        // $fileName = time() . '.' . $request->photo->extension();
        // $request->photo->move(public_path() .'/images/article/', $fileName);
        
        $berita = new Info;
        $berita->title = $request->title;
        $berita->content = $request->content;
        $berita->photo = $fileName;
        if ($request->has('description')) {
            $berita->description = $request->description;
        }

        $berita->approved = $request->status;
        $berita->created_at = date("Y-m-d H:i:s");
        // $berita->is_front = $request->is_front;
        // $berita->created_by = Auth::user()->id;

        if ($berita->save()) {
            return redirect()->route('admin.list.artikel.info')->withSuccess('Succesfully created article');
        } else {
            return back()->withSuccess('Failed created article');
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
        $berita = Info::findOrFail($decryptedId);
        // print_r($berita);die();

        return view('admin.info.cmsEdit', compact('berita'));
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
        $berita = Info::findOrFail($decryptedId);

        $request->validate([
            '_token' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'content' => 'required|string'
        ]);
        
        if (empty($request->photo)) {
            $berita->photo = $request->exist;
        }else {
            $image_parts = explode(";base64,", $request->photo);
            $image_type_aux = explode("image/", $image_parts[0]);
            
            $image_type = $image_type_aux[1];
            $extension = $image_type;
            $fileName = time() . rand() .'.' . $extension;

            Image::make($request->photo)->resize(1920, 1200)->save(public_path() .'/images/article/'. $fileName);    
            
            $berita->photo = $fileName;
        }

        $berita->title = $request->title;
        $berita->content = $request->content;
        
        if ($request->has('description')) {
            $berita->description = $request->description;
        }

        $berita->approved = $request->status;
        $berita->updated_at = date("Y-m-d H:i:s");
        // $berita->created_by = Auth::user()->id;

        if ($berita->update()) {
            return redirect()->route('admin.list.artikel.info')->withSuccess('Succesfully updated article');
        } else {
            return back()->withSuccess('Failed updated article');
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
        $berita = Info::findOrFail($decryptedId);

        if ($berita->delete()) {
            return redirect()->route('admin.list.artikel.info')->withSuccess('Succesfully deleted');
        } else {
            return back()->withSuccess('Failed deleted Article');
        }
    }

    
    public function changeStatus(Request $request, $id, $params)
    {
        // print_r($params);die();
    
        $decryptedId = decrypt($id);
        
        $berita = Info::find($decryptedId);
        $berita->approved = $params;

        if ($berita->update()) {
            return redirect()->route('admin.list.artikel.info')->withSuccess('Succesfully change status');
        } else {
            return back()->withSuccess('Failed deleted Article');
        }
    }
}
