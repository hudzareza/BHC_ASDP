<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Info;
use App\Models\Sliderbanner;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        // return view('articles.coming');

        $banner =  DB::table('sliderbanners')
            ->select('galleries.*', 'sliderbanners.*')
            ->join('galleries', 'galleries.id', '=', 'sliderbanners.id_gallery')
            ->get();

        $data['main'] = DB::table('articles')
            ->where('approved', '=', "1")
            ->paginate(3);

        $data['info'] = DB::table('infos')
            ->where('approved', '=', "1")
            ->latest()->take(6)->get();
        // print_r($banner);die();
        return view('articles.index', compact('banner', 'data'));
    }

    public function coming(): View
    {
        return view('articles.coming');
    }
}
