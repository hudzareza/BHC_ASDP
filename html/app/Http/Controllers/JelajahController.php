<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class JelajahController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['role:SuperAdmin|Admin|Admin_innovation', 'permission:innovation_show|innovation_create|innovation_update|innovation_detail|innovation_delete']);
    }

    public function index($id)
    {
        $data = DB::table('articles')->where('id', '=', $id)->get();

        $photo[] = explode('|', $data[0]->gallery);

        $kode = app()->getLocale();

        $beritas = Article::where('approved', '=', '1')->where('kode', '=', $kode)->latest()->paginate(4);

        return view('jelajah.index', compact('data', 'photo', 'beritas'));
    }

    public function show()
    {
    }
    // admin----------------------------------------------------------------

    public function cmslist()
    {
        //
        $beritas = Article::all()->sortByDesc('id');

        return view('admin.jelajah.cmsList', compact('beritas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cmsAdd()
    {
        //
        return view('admin.jelajah.cmsAdd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');

        // print_r($_POST);die();
        $berita = new Article;

        if (empty($_FILES['gallery']['name'][0])) {
            $request->validate([
                '_token' => 'required|string',
                'title' => 'required|string',
                'description' => 'required|string',
                'content' => 'required|string'
            ]);
        } else {
            $request->validate([
                'photo' => 'required',
                'gallery' => 'max:6',
                'title' => 'required|string',
                'description' => 'required|string',
                'content' => 'required|string'
            ]);

            $gallery = array();
            if ($files = $request->file('gallery')) {
                foreach ($files as $file) {
                    $info = $file->getClientOriginalName();
                    $name = pathinfo($info, PATHINFO_FILENAME);
                    $ext = pathinfo($info, PATHINFO_EXTENSION);
                    $name = time() . rand() . '.' . $ext;
                    $file->move(public_path() . '/images/article/jelajah/', $name);
                    $gallery[] = $name;
                }
            }
            $berita->gallery = implode("|", $gallery);
        }

        $image_parts = explode(";base64,", $request->photo);
        $image_type_aux = explode("image/", $image_parts[0]);

        $image_type = $image_type_aux[1];
        $extension = $image_type;
        $fileName = time() . rand() . '.' . $extension;

        Image::make($request->photo)->resize(1920, 1200)->save(public_path() . '/images/article/' . $fileName);

        $berita->title = $request->title;
        $berita->content = $request->content;
        $berita->photo = $fileName;
        $berita->kode = $request->kode;

        if ($request->has('description')) {
            $berita->description = $request->description;
        }

        $berita->approved = $request->status;
        $berita->created_at = date("Y-m-d H:i:s");
        // $berita->is_front = $request->is_front;
        // $berita->created_by = Auth::user()->id;

        if ($berita->save()) {
            return redirect()->route('admin.list.artikel.jelajah')->withSuccess('Succesfully created article');
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
        $berita = Article::findOrFail($decryptedId);
        $explode = explode('|', $berita['gallery']);

        // print_r($explode);
        // die();

        return view('admin.jelajah.cmsEdit', compact('berita', 'explode'));
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
        date_default_timezone_set('Asia/Jakarta');

        // Decrypt article ID
        $decryptedId = decrypt($id);

        // Find article Data
        $berita = Article::findOrFail($decryptedId);

        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'content' => 'required|string'
        ]);

        if (empty($request->photo)) {
            $berita->photo = $request->exist;
        } else {
            $image_parts = explode(";base64,", $request->photo);
            $image_type_aux = explode("image/", $image_parts[0]);

            $image_type = $image_type_aux[1];
            $extension = $image_type;
            $fileName = time() . rand() . '.' . $extension;

            Image::make($request->photo)->resize(1920, 1200)->save(public_path() . '/images/article/' . $fileName);
            $berita->photo = $fileName;
        }

        if (empty($request->galeri[0]) && empty($request->file('gallery'))) {
            $berita->gallery = null;
            // print_r($berita->gallery);
            // die();
        } else {
            if (empty($request->file())) {
                $implode = implode("|", $request->galeri);
                $berita->gallery = $implode;
            } else {
                $request->validate([
                    'title' => 'required|string',
                    'description' => 'required|string',
                    'gallery' => 'max:6',
                    'content' => 'required|string'
                ]);

                $gallery = array();
                if ($files = $request->file('gallery')) {
                    foreach ($files as $file) {
                        $info = $file->getClientOriginalName();
                        $name = pathinfo($info, PATHINFO_FILENAME);
                        $ext = pathinfo($info, PATHINFO_EXTENSION);
                        $name = time() . rand() . '.' . $ext;
                        $file->move(public_path() . '/images/article/jelajah/', $name);
                        $gallery[] = $name;
                    }
                }
                // print_r($gallery);
                // echo "<br>";
                // print_r($request->galeri[0]);
                // die();
                if (empty($request->galeri[0])) {
                    $berita->gallery = implode("|", $gallery);
                } else {
                    $merge = array_merge($request->galeri, $gallery);
                    $berita->gallery = implode("|", $merge);
                }
            }
        }



        $berita->title = $request->title;
        $berita->content = $request->content;
        $berita->kode = $request->kode;

        if ($request->has('description')) {
            $berita->description = $request->description;
        }

        $berita->approved = $request->status;
        $berita->updated_at = date("Y-m-d H:i:s");
        // $berita->created_by = Auth::user()->id;

        if ($berita->update()) {
            return redirect()->route('admin.list.artikel.jelajah')->withSuccess('Succesfully updated article');
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
        $berita = Article::findOrFail($decryptedId);

        if ($berita->delete()) {
            return redirect()->route('admin.list.artikel.jelajah')->withSuccess('Succesfully deleted');
        } else {
            return back()->withSuccess('Failed deleted Article');
        }
    }


    public function changeStatus(Request $request, $id, $params)
    {
        // print_r($params);die();

        $decryptedId = decrypt($id);

        $berita = Article::find($decryptedId);
        $berita->approved = $params;

        if ($berita->update()) {
            return redirect()->route('admin.list.artikel.jelajah')->withSuccess('Succesfully change status');
        } else {
            return back()->withSuccess('Failed deleted Article');
        }
    }
}
