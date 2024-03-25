<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Article;
use App\Models\Event;
use App\Models\Month;
use App\Models\Year;
use App\Models\Activedate;
use App\Models\Sliderevent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;


class EventController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        date_default_timezone_set('UTC');
        // ** uncomment if activate mode set event
        $active = Activedate::where('void', '1')->latest()->paginate(1);

        $data = json_decode(json_encode($active), true);
        // print_r($data);die();
        if (empty($data['data'])) {
            $month = date("m");
            $year = $this->year(date("Y"));
            $monthName = $this->month(date("m"));
            $yearName = date("Y");
        } else {
            # code...

            $month = $active[0]->month;
            $year = $active[0]->year;

            $monthName = $this->month($month);
            $yearName = $this->yearAlt($year);
        }

        $beritas = Event::where('month', $month)->where('year', $year)->where('approved', '1')->get();

        return view('event.index', compact('beritas', 'monthName', 'yearName', 'year'));
    }

    public function detail($id): View
    {
        $data = DB::table('events')
            ->where('id', '=', $id)->get();

        $month = $data[0]->month;
        $year = $data[0]->year;

        $monthName = $this->monthAlt($month);
        $yearName = $this->yearAlt($year);

        $beritas = Event::where('month', $month)->where('year', $year)->latest()->paginate(4);
        // print_r($data);die();
        return view('event.detail', compact('data', 'monthName', 'yearName', 'beritas'));
    }

    public function kanal($id, $params): View
    {

        $beritas = Event::where('month', $id)->where('year', $params)->where('approved', '1')->get();
        // $beritas = json_decode(json_encode($beritas), true);

        // print_r($beritas);die();
        $monthName = $this->monthAlt($id);
        $yearName = $this->yearAlt($params);
        return view('event.kanal', compact('beritas', 'monthName', 'yearName'));
    }

    // admin 

    public function setactivedate(Request $request)
    {
        date_default_timezone_set('UTC');
        // print_r($_POST);die();
        $berita = new Activedate;
        $berita->month = $request->month;
        $berita->year = $request->year;

        $berita->created_at = date("Y-m-d H:i:s");
        $berita->void = '1';
        // $berita->created_by = Auth::user()->id;

        if ($berita->save()) {
            return redirect()->route('admin.list.artikel.event')->withSuccess('Succesfully set event calendar');
        } else {
            return back()->withSuccess('Failed set event calendar');
        }
    }

    public function autodate(Request $request)
    {
        // print_r($_POST);die();
        $date = Activedate::latest()->paginate(1);
        $date = json_decode(json_encode($date), true);
        $id = $date['data'][0]['id'];

        $berita = Activedate::findOrFail($id);

        // print_r();die();

        $berita->void = $request->void;
        // $berita->created_by = Auth::user()->id;

        if ($berita->update()) {
            return redirect()->route('admin.list.artikel.event')->withSuccess('Succesfully set event calendar automatically');
        } else {
            return back()->withSuccess('Failed set event calendar');
        }
    }

    public function cmsAdd(): View
    {
        $month = Month::all()->sortBy('id');
        $year = Year::all()->sortBy('id');

        return view('admin.event.cmsAdd', compact('month', 'year'));
    }

    public function store(Request $request)
    {
        date_default_timezone_set('UTC');
        $request->validate([
            '_token' => 'required|string',
            'photo' => 'required',
            'title' => 'required|string',
            'description' => 'required|string',
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

        $berita = new Event;
        $berita->title = $request->title;
        $berita->content = $request->content;
        $berita->photo = $fileName;
        if ($request->has('description')) {
            $berita->description = $request->description;
        }

        $berita->approved = $request->status;
        $berita->month = $request->month;
        $berita->year = $request->year;
        $berita->created_at = date("Y-m-d H:i:s");
        // $berita->is_front = $request->is_front;
        // $berita->created_by = Auth::user()->id;

        if ($berita->save()) {
            return redirect()->route('admin.list.artikel.event')->withSuccess('Succesfully created event');
        } else {
            return back()->withSuccess('Failed created event');
        }
    }

    public function cmsList(): View
    {

        if (isset($_GET['year']) && isset($_GET['month'])) {
            $year = $_GET['year'];
            $month = $_GET['month'];
            $beritas = Event::where('month', $month)->where('year', $year)->get();
            // print_r($beritas);

        } else {
            $beritas = Event::all()->sortByDesc('id');
        }
        $yearlist = Year::all()->sortBy('id');

        return view('admin.event.cmsList', compact('beritas', 'yearlist'));
    }

    public function cmsEdit($id)
    {
        $decryptedId = decrypt($id);

        // Find article Data
        $berita = Event::findOrFail($decryptedId);
        $month = DB::table('events')
            ->join('months', 'months.id', '=', 'events.month')
            ->select('events.*', 'months.name')
            ->get();
        $year = DB::table('events')
            ->join('years', 'years.id', '=', 'events.year')
            ->select('events.*', 'years.name')
            ->get();
        $monthlist = Month::all()->sortBy('id');
        $yearlist = Year::all()->sortBy('id');
        // print_r($year);die();

        return view('admin.event.cmsEdit', compact('berita', 'month', 'year', 'monthlist', 'yearlist'));
    }

    public function update(Request $request, $id)
    {
        date_default_timezone_set('UTC');
        // Decrypt article ID
        $decryptedId = decrypt($id);

        // Find article Data
        $berita = Event::findOrFail($decryptedId);

        $request->validate([
            '_token' => 'required|string',
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



        $berita->title = $request->title;
        $berita->content = $request->content;

        if ($request->has('description')) {
            $berita->description = $request->description;
        }

        $berita->approved = $request->status;
        $berita->month = $request->month;
        $berita->year = $request->year;
        $berita->updated_at = date("Y-m-d H:i:s");
        // $berita->created_by = Auth::user()->id;

        if ($berita->update()) {
            return redirect()->route('admin.list.artikel.event')->withSuccess('Succesfully updated event');
        } else {
            return back()->withSuccess('Failed updated event');
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
        $berita = Event::findOrFail($decryptedId);

        if ($berita->delete()) {
            return redirect()->route('admin.list.artikel.event')->withSuccess('Succesfully deleted');
        } else {
            return back()->withSuccess('Failed deleted');
        }
    }


    public function changeStatus(Request $request, $id, $params)
    {
        // print_r($params);die();

        $decryptedId = decrypt($id);

        $berita = Event::find($decryptedId);
        $berita->approved = $params;

        if ($berita->update()) {
            return redirect()->route('admin.list.artikel.event')->withSuccess('Succesfully change status');
        } else {
            return back()->withSuccess('Failed change status event');
        }
    }


    public function cmsListMonth(): View
    {
        $yearlist = Year::all()->sortBy('id');
        $monthlist = Month::all()->sortBy('id');

        return view('admin.event.cmsListMonth', compact('yearlist', 'monthlist'));
    }

    public function cmsAddMonth(): View
    {
        return view('admin.event.cmsAddMonth');
    }

    public function cmsEditMonth(): View
    {
        return view('admin.event.cmsEditMonth');
    }

    public function slideList(): View
    {
        $beritas = DB::table('sliderevents')
            ->select('events.*', 'sliderevents.*')
            ->join('events', 'events.id', '=', 'sliderevents.id_event')
            ->get();
        // print_r($beritas);die();

        return view('admin.event.slideList', compact('beritas'));
    }

    public function slideAdd(): View
    {
        if (isset($_POST['src'])) {
            $cari = $_POST['src'];
            $beritas = DB::table('events')
                ->where('description', 'like', "%" . $cari . "%")
                ->paginate();
        } else {

            $beritas = DB::table('events')
                ->where('approved', '=', "1")
                ->paginate();
        }
        return view('admin.event.slideAdd', compact('beritas'));
    }

    public function storeslider(Request $request)
    {
        date_default_timezone_set('UTC');
        $berita = new Sliderevent;
        $berita->id_event = $request->id;
        $berita->created_at = date("Y-m-d H:i:s");
        // $berita->is_front = $request->is_front;
        // $berita->created_by = Auth::user()->id;

        if ($berita->save()) {
            return redirect()->route('admin.list.slide.event')->withSuccess('Succesfully add event');
        } else {
            return back()->withSuccess('Failed add event');
        }
    }
    public function destroyslider($id)
    {
        // print_r($id);die();
        // Decrypt article ID
        $decryptedId = decrypt($id);

        // Find article Data
        $berita = Sliderevent::findOrFail($decryptedId);

        if ($berita->delete()) {
            return redirect()->route('admin.list.slide.event')->withSuccess('Succesfully deleted');
        } else {
            return back()->withSuccess('Failed deleted');
        }
    }

    public function month($params)
    {
        if ($params == '01') {
            $monthName = 'Januari';
        } elseif ($params == '02') {
            $monthName = 'Februari';
        } elseif ($params == '03') {
            $monthName = 'Maret';
        } elseif ($params == '04') {
            $monthName = 'April';
        } elseif ($params == '05') {
            $monthName = 'Mei';
        } elseif ($params == '06') {
            $monthName = 'Juni';
        } elseif ($params == '07') {
            $monthName = 'Juli';
        } elseif ($params == '08') {
            $monthName = 'Agustus';
        } elseif ($params == '09') {
            $monthName = 'September';
        } elseif ($params == '10') {
            $monthName = 'Oktober';
        } elseif ($params == '11') {
            $monthName = 'November';
        } elseif ($params == '12') {
            $monthName = 'Desember';
        }

        return $monthName;
    }

    public function monthAlt($params)
    {
        if ($params == '1') {
            $monthName = 'Januari';
        } elseif ($params == '2') {
            $monthName = 'Februari';
        } elseif ($params == '3') {
            $monthName = 'Maret';
        } elseif ($params == '4') {
            $monthName = 'April';
        } elseif ($params == '5') {
            $monthName = 'Mei';
        } elseif ($params == '6') {
            $monthName = 'Juni';
        } elseif ($params == '7') {
            $monthName = 'Juli';
        } elseif ($params == '8') {
            $monthName = 'Agustus';
        } elseif ($params == '9') {
            $monthName = 'September';
        } elseif ($params == '10') {
            $monthName = 'Oktober';
        } elseif ($params == '11') {
            $monthName = 'November';
        } elseif ($params == '12') {
            $monthName = 'Desember';
        }

        return $monthName;
    }

    public function year($params)
    {
        if ($params == '2023') {
            $year = '4';
        } elseif ($params == '2024') {
            $year = '5';
        } elseif ($params == '2025') {
            $year = '6';
        } elseif ($params == '2026') {
            $year = '7';
        } elseif ($params == '2027') {
            $year = '8';
        } elseif ($params == '2028') {
            $year = '9';
        } elseif ($params == '2029') {
            $year = '10';
        } elseif ($params == '2030') {
            $year = '11';
        } elseif ($params == '2031') {
            $year = '12';
        } elseif ($params == '2032') {
            $year = '13';
        } elseif ($params == '2033') {
            $year = '14';
        } elseif ($params == '2034') {
            $year = '15';
        } elseif ($params == '2035') {
            $year = '16';
        } elseif ($params == '2020') {
            $year = '1';
        } elseif ($params == '2021') {
            $year = '2';
        } elseif ($params == '2022') {
            $year = '3';
        }

        return $year;
    }

    public function yearAlt($params)
    {
        if ($params == '4') {
            $year = '2023';
        } elseif ($params == '5') {
            $year = '2024';
        } elseif ($params == '6') {
            $year = '2025';
        } elseif ($params == '7') {
            $year = '2026';
        } elseif ($params == '8') {
            $year = '2027';
        } elseif ($params == '9') {
            $year = '2028';
        } elseif ($params == '10') {
            $year = '2029';
        } elseif ($params == '11') {
            $year = '2030';
        } elseif ($params == '12') {
            $year = '2031';
        } elseif ($params == '13') {
            $year = '2032';
        } elseif ($params == '14') {
            $year = '2033';
        } elseif ($params == '15') {
            $year = '2034';
        } elseif ($params == '16') {
            $year = '2035';
        } elseif ($params == '1') {
            $year = '2020';
        } elseif ($params == '2') {
            $year = '2021';
        } elseif ($params == '3') {
            $year = '2022';
        }

        return $year;
    }
}
