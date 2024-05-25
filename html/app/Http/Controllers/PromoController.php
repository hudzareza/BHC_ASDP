<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Promo;
use App\Models\Ticket;
use App\Models\Sliderpromo;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;



class PromoController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        $kode = app()->getLocale();

        $tiket = Ticket::where('approved', "1")->orderBy('id', 'desc')->get();

        $promo = Promo::where('approved', "1")->where('kode', '=', $kode)->orderBy('id', 'desc')->get();

        return view('promo.index', compact('tiket', 'promo'));
    }

    public function detail($id): View
    {
        $kode = app()->getLocale();

        $data = DB::table('promos')
            ->where('id', '=', $id)->get();

        $beritas = Promo::where('approved', '=', '1')->where('kode', '=', $kode)->latest()->paginate(4);
        return view('promo.detail', compact('beritas', 'data'));
    }

    // admin 

    public function cmslist()
    {
        //
        $beritas = Promo::all()->sortByDesc('id');

        return view('admin.promo.cmsList', compact('beritas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cmsAdd()
    {
        //
        return view('admin.promo.cmsAdd');
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

        $request->validate([
            '_token' => 'required|string',
            'photo' => 'required',
            'title' => 'required|string',
            'content' => 'required|string'
        ]);

        $image_parts = explode(";base64,", $request->photo);
        $image_type_aux = explode("image/", $image_parts[0]);

        $image_type = $image_type_aux[1];
        $extension = $image_type;
        $fileName = time() . rand() . '.' . $extension;

        Image::make($request->photo)->resize(1920, 1200)->save(public_path() . '/images/article/' . $fileName);

        // $fileName = time() . '.' . $request->photo->extension();
        // $request->photo->move(public_path() .'/images/article/', $fileName);

        $berita = new Promo;
        $berita->title = $request->title;
        $berita->content = $request->content;
        $berita->photo = $fileName;
        $berita->kode = $request->kode;
        $berita->approved = $request->status;
        $berita->created_at = date("Y-m-d H:i:s");
        // $berita->is_front = $request->is_front;
        // $berita->created_by = Auth::user()->id;

        if ($berita->save()) {
            return redirect()->route('admin.list.artikel.promo')->withSuccess('Succesfully created article');
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
        $berita = Promo::findOrFail($decryptedId);
        // print_r($berita);die();

        return view('admin.promo.cmsEdit', compact('berita'));
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
        $berita = Promo::findOrFail($decryptedId);

        $request->validate([
            '_token' => 'required|string',
            'title' => 'required|string',
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


        $berita->title = $request->title;
        $berita->content = $request->content;
        $berita->kode = $request->kode;

        $berita->approved = $request->status;
        $berita->updated_at = date("Y-m-d H:i:s");
        // $berita->created_by = Auth::user()->id;

        if ($berita->update()) {
            return redirect()->route('admin.list.artikel.promo')->withSuccess('Succesfully updated article');
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
        $berita = Promo::findOrFail($decryptedId);

        if ($berita->delete()) {
            return redirect()->route('admin.list.artikel.promo')->withSuccess('Succesfully deleted');
        } else {
            return back()->withSuccess('Failed deleted Article');
        }
    }


    public function changeStatus(Request $request, $id, $params)
    {
        // print_r($params);die();

        $decryptedId = decrypt($id);

        $berita = Promo::find($decryptedId);
        $berita->approved = $params;

        if ($berita->update()) {
            return redirect()->route('admin.list.artikel.promo')->withSuccess('Succesfully change status');
        } else {
            return back()->withSuccess('Failed deleted Article');
        }
    }

    public function slideList(): View
    {
        $beritas = DB::table('sliderpromos')
            ->select('promos.*', 'sliderpromos.*')
            ->join('promos', 'promos.id', '=', 'sliderpromos.id_promo')
            ->get();

        return view('admin.promo.slideList', compact('beritas'));
    }

    public function slideAdd(): View
    {
        if (isset($_POST['src'])) {
            $cari = $_POST['src'];
            $beritas = DB::table('promos')
                ->where('name', 'like', "%" . $cari . "%")
                ->paginate();
        } else {

            $beritas = DB::table('promos')
                ->where('approved', '=', "1")
                ->paginate();
        }
        // print_r($beritas);die();
        return view('admin.promo.slideAdd', compact('beritas'));
    }

    public function storeslider(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');

        $berita = new Sliderpromo;
        $berita->id_promo = $request->id;
        $berita->created_at = date("Y-m-d H:i:s");
        // $berita->is_front = $request->is_front;
        // $berita->created_by = Auth::user()->id;

        if ($berita->save()) {
            return redirect()->route('admin.promo.slide.list')->withSuccess('Succesfully add slider');
        } else {
            return back()->withSuccess('Failed add slider');
        }
    }
    public function destroyslider($id)
    {
        // print_r($id);die();
        // Decrypt article ID
        $decryptedId = decrypt($id);

        // Find article Data
        $berita = Sliderpromo::findOrFail($decryptedId);

        if ($berita->delete()) {
            return redirect()->route('admin.promo.slide.list')->withSuccess('Succesfully deleted');
        } else {
            return back()->withSuccess('Failed deleted');
        }
    }
}
