<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Sliderbanner;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    /**
     * index
     *
     * @return View
     */

    // gallery ----------------------------------------------------------------

    public function index(): View
    {
        return view('gallery.index');
    }

    // end gallery ----------------------------------------------------------------


    // admin ----------------------------------------------------------------

    public function slideList(): View
    {
        // $beritas = Sliderbanner::all()->sortByDesc('id');
        $beritas = DB::table('sliderbanners')
            ->select('galleries.*', 'sliderbanners.*')
            ->join('galleries', 'galleries.id', '=', 'sliderbanners.id_gallery')
            ->get()->sortByDesc('id');
        // print_r($beritas);die();
        return view('admin.gallery.slideList', compact('beritas'));
    }

    public function slideAdd(): View //pick gallery
    {
        if (isset($_POST['src'])) {
            $cari = $_POST['src'];
            $beritas = DB::table('galleries')
                ->where('category', 'like', "%" . $cari . "%")
                ->paginate();
        } else {
            $beritas = Gallery::all()->sortByDesc('id');
        }

        return view('admin.gallery.slideAdd', compact('beritas'));
    }

    public function storebanner(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');

        $berita = new Sliderbanner;
        $berita->id_gallery = $request->id;
        $berita->created_at = date("Y-m-d H:i:s");
        // $berita->is_front = $request->is_front;
        // $berita->created_by = Auth::user()->id;

        if ($berita->save()) {
            return redirect()->route('admin.list.banner')->withSuccess('Succesfully add image');
        } else {
            return back()->withSuccess('Failed add image');
        }
    }
    public function destroyslider($id)
    {

        // Decrypt article ID
        $decryptedId = decrypt($id);
        // print_r($decryptedId);die();
        // Find article Data
        $berita = Sliderbanner::findOrFail($decryptedId);

        if ($berita->delete()) {
            return redirect()->route('admin.list.banner')->withSuccess('Succesfully deleted');
        } else {
            return back()->withSuccess('Failed deleted');
        }
    }
    // end slider ----------------------------------------------------------------

    public function galleryList(): View
    {
        $beritas = Gallery::all()->sortByDesc('id');
        // echo date_default_timezone_get();
        // die();
        return view('admin.gallery.galleryList', compact('beritas'));
    }

    public function galleryAdd(): View
    {
        return view('admin.gallery.galleryAdd');
    }

    public function galleryEdit($id): View
    {
        // Decrypt aryicle ID
        $decryptedId = decrypt($id);

        // Find article Data
        $berita = Gallery::findOrFail($decryptedId);
        // print_r($berita);die();

        return view('admin.gallery.galleryEdit', compact('berita'));
    }

    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');

        // print_r($_POST);die();
        $request->validate([
            'photo' => 'required',
            'category' => 'required|string',
            'caption' => 'required|string'
        ]);

        $image_parts = explode(";base64,", $request->photo);
        $image_type_aux = explode("image/", $image_parts[0]);

        $image_type = $image_type_aux[1];

        // $image_base64 = base64_decode($image_parts[1]);
        // $imageName = uniqid() . '.png';
        // print_r($request->photo);die();

        // $fileInfo = $request->photo->getClientOriginalName();
        // $fileName = pathinfo($fileInfo, PATHINFO_FILENAME);
        $extension = $image_type;
        $fileName = time() . rand() . '.' . $extension;

        Image::make($request->photo)->resize(1450, 620)->save(public_path() . '/images/article/' . $fileName);

        // $fileName = time() . '.' . $request->photo->extension();
        // $request->photo->move(public_path() .'/images/article/', $fileName);

        $berita = new Gallery;
        $berita->category = $request->category;
        $berita->caption = $request->caption;
        $berita->photo = $fileName;
        $berita->created_at = date("Y-m-d H:i:s");
        // $berita->is_front = $request->is_front;
        // $berita->created_by = Auth::user()->id;

        if ($berita->save()) {
            return redirect()->route('admin.list.galeri')->withSuccess('Succesfully upload image');
        } else {
            return back()->withSuccess('Failed upload image');
        }
    }

    public function update(Request $request, $id)
    {
        date_default_timezone_set('Asia/Jakarta');

        // Decrypt article ID
        $decryptedId = decrypt($id);

        // Find article Data
        $berita = Gallery::findOrFail($decryptedId);

        // if (empty($_FILES['photo']['name'])) {
        //     $request->validate([
        //         'category' => 'required|string',
        //         'caption' => 'required|string'
        //     ]);
        // }else {

        $request->validate([
            '_token' => 'required|string',
            'category' => 'required|string',
            'caption' => 'required|string'
        ]);


        if (empty($request->photo)) {
            $berita->photo = $request->exist;
        } else {
            $image_parts = explode(";base64,", $request->photo);
            $image_type_aux = explode("image/", $image_parts[0]);

            $image_type = $image_type_aux[1];
            $extension = $image_type;
            $fileName = time() . rand() . '.' . $extension;
            Image::make($request->photo)->resize(1450, 620)->save(public_path() . '/images/article/' . $fileName);

            $berita->photo = $fileName;
        }

        $berita->caption = $request->caption;
        $berita->category = $request->category;
        $berita->updated_at = date("Y-m-d H:i:s");
        // $berita->created_by = Auth::user()->id;

        if ($berita->update()) {
            return redirect()->route('admin.list.galeri')->withSuccess('Succesfully updated gallery');
        } else {
            return back()->withSuccess('Failed updated gallery');
        }
    }

    public function destroy($id)
    {
        // Decrypt article ID
        $decryptedId = decrypt($id);

        // Find article Data
        $berita = Gallery::findOrFail($decryptedId);

        if ($berita->delete()) {
            return redirect()->route('admin.list.galeri')->withSuccess('Succesfully deleted');
        } else {
            return back()->withSuccess('Failed deleted');
        }
    }
}
