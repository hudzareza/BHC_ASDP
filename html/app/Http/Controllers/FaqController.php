<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Faq;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Illuminate\View\View;

class FaqController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        $kode = app()->getLocale();

        $beritas = Faq::where('approved', "1")->where('kode', '=', $kode)->get();

        return view('faq.index', compact('beritas'));
    }

    // admin

    public function cmslist()
    {
        //
        $beritas = Faq::all()->sortByDesc('id');

        return view('admin.faq.cmsList', compact('beritas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cmsAdd()
    {
        //
        return view('admin.faq.cmsAdd');
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
            'question' => 'required|string',
            'answer' => 'required|string'
        ]);

        $berita = new Faq;
        $berita->question = $request->question;
        $berita->answer = $request->answer;

        $berita->kode = $request->kode;
        $berita->approved = $request->status;
        $berita->created_at = date("Y-m-d H:i:s");
        // $berita->created_by = Auth::user()->id;

        if ($berita->save()) {
            return redirect()->route('admin.list.artikel.faq')->withSuccess('Succesfully created');
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
        $berita = Faq::findOrFail($decryptedId);
        // print_r($berita);die();

        return view('admin.faq.cmsEdit', compact('berita'));
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
        $berita = Faq::findOrFail($decryptedId);

        $request->validate([
            '_token' => 'required|string',
            'question' => 'required|string',
            'answer' => 'required|string'
        ]);

        $berita->question = $request->question;
        $berita->answer = $request->answer;
        $berita->kode = $request->kode;

        $berita->approved = $request->status;
        $berita->updated_at = date("Y-m-d H:i:s");
        // $berita->created_by = Auth::user()->id;

        if ($berita->update()) {
            return redirect()->route('admin.list.artikel.faq')->withSuccess('Succesfully updated');
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
        $berita = Faq::findOrFail($decryptedId);

        if ($berita->delete()) {
            return redirect()->route('admin.list.artikel.faq')->withSuccess('Succesfully deleted');
        } else {
            return back()->withSuccess('Failed deleted');
        }
    }


    public function changeStatus(Request $request, $id, $params)
    {
        // print_r($params);die();

        $decryptedId = decrypt($id);

        $berita = Faq::find($decryptedId);
        $berita->approved = $params;

        if ($berita->update()) {
            return redirect()->route('admin.list.artikel.faq')->withSuccess('Succesfully change status');
        } else {
            return back()->withSuccess('Failed change status');
        }
    }
}
