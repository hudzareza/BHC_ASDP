<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Language;
use App\Models\Navbar_lang;
use App\Models\Footer_lang;
use App\Models\Login_lang;
use App\Models\Home_lang;
use App\Models\Event_lang;
use App\Models\Jelajah_lang;
use App\Models\Info_lang;
use App\Models\Contact_lang;
use App\Models\Tickets_lang;
use App\Models\Promo_lang;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;

class LanguageController extends Controller
{
    public function list(Request $request)
    {
        $beritas = Language::all()->sortByDesc('id');
        return view('admin.language.list', compact('beritas'));
    }

    public function cmsAdd()
    {
        return view('admin.language.add');
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
            'name' => 'required|string',
            'alias' => 'required|string',
            'kode' => 'required|string'
        ]);

        $berita = new Language;
        $berita->name = $request->name;
        $berita->alias = $request->alias;
        $berita->kode = $request->kode;

        $berita->created_at = date("Y-m-d H:i:s");

        if ($berita->save()) {
            return redirect()->route('admin.list.lang')->withSuccess('Succesfully created');
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

        $decryptedId = decrypt($id);

        $berita = Language::findOrFail($decryptedId);

        return view('admin.language.edit', compact('berita'));
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
        $berita = Language::findOrFail($decryptedId);

        $request->validate([
            'name' => 'required|string',
            'alias' => 'required|string',
            'kode' => 'required|string'
        ]);

        $berita->name = $request->name;
        $berita->alias = $request->alias;
        $berita->kode = $request->kode;
        $berita->updated_at = date("Y-m-d H:i:s");

        if ($berita->update()) {
            return redirect()->route('admin.list.lang')->withSuccess('Succesfully updated');
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
    }

    public function listLayout($id)
    {
        $decryptedId = decrypt($id);

        $berita = Language::findOrFail($decryptedId);
        $code = $berita->kode;

        return view('admin.language.listLayout', compact('code', 'id'));
    }

    public function navbar($id)
    {
        $decryptedId = decrypt($id);

        $berita = Language::findOrFail($decryptedId);
        $navbar = Navbar_lang::where('id_bahasa', '=', $decryptedId)->first();

        $code = $berita->kode;

        return view('admin.language.navbar', compact('code', 'id', 'navbar'));
    }

    public function navbarUpsert(Request $request, $id)
    {
        // Decrypt article ID
        $decryptedId = decrypt($id);

        $request->validate([
            'kode' => 'required|string',
            'beranda' => 'required|string',
            'event' => 'required|string',
            'jelajah' => 'required|string',
            'tiket_promo' => 'required|string',
            'kontak' => 'required|string',
            'faq' => 'required|string',
            'bahasa' => 'required|string',
            'masuk' => 'required|string'
        ]);


        $data = [
            'id_bahasa' => $decryptedId,
            'kode' => $request->kode,
            'beranda' => $request->beranda,
            'event' => $request->event,
            'jelajah' => $request->jelajah,
            'tiket_promo' => $request->tiket_promo,
            'kontak' => $request->kontak,
            'faq' => $request->faq,
            'bahasa' => $request->bahasa,
            'masuk' => $request->masuk,
            'edit_date' => date("Y-m-d H:i:s"),
        ];

        $condition = [
            'id_bahasa' => $decryptedId,
            'kode' => $request->kode,
        ];

        $upsert = Navbar_lang::updateOrInsert($condition, $data);

        if ($upsert) {
            return redirect()->route('admin.layout.lang', $id)->withSuccess('Succesfully updated Navbar Layout');
        } else {
            return back()->withSuccess('Failed updated');
        }
    }

    public function footer($id)
    {
        $decryptedId = decrypt($id);

        $berita = Language::findOrFail($decryptedId);
        $footer = Footer_lang::where('id_bahasa', '=', $decryptedId)->first();

        $code = $berita->kode;

        return view('admin.language.footer', compact('code', 'id', 'footer'));
    }

    public function footerUpsert(Request $request, $id)
    {
        // Decrypt article ID
        $decryptedId = decrypt($id);

        $request->validate([
            'kode' => 'required|string',
            'deskripsi' => 'required|string',
            'halaman' => 'required|string',
            'kontak_kami' => 'required|string',
            'email' => 'required|string',
            'whatsapp' => 'required|string',
            'ikuti_kami' => 'required|string',
            'hak_cipta' => 'required|string'
        ]);

        $data = [
            'id_bahasa' => $decryptedId,
            'kode' => $request->kode,
            'deskripsi' => $request->deskripsi,
            'halaman' => $request->halaman,
            'kontak_kami' => $request->kontak_kami,
            'email' => $request->email,
            'whatsapp' => $request->whatsapp,
            'ikuti_kami' => $request->ikuti_kami,
            'hak_cipta' => $request->hak_cipta,
            'edit_date' => date("Y-m-d H:i:s"), // or use your preferred method to get the current date and time
        ];

        $condition = [
            'id_bahasa' => $decryptedId,
            'kode' => $request->kode,
        ];

        $upsert = Footer_lang::updateOrInsert($condition, $data);

        if ($upsert) {
            return redirect()->route('admin.layout.lang', $id)->withSuccess('Succesfully updated Footer Layout');
        } else {
            return back()->withSuccess('Failed updated');
        }
    }

    public function login($id)
    {
        $decryptedId = decrypt($id);

        $berita = Language::findOrFail($decryptedId);
        $login = Login_lang::where('id_bahasa', '=', $decryptedId)->first();

        $code = $berita->kode;

        return view('admin.language.login', compact('code', 'id', 'login'));
    }

    public function loginUpsert(Request $request, $id)
    {
        // Decrypt article ID
        $decryptedId = decrypt($id);

        $request->validate([
            'kode' => 'required|string',
            'header_login' => 'required|string',
            'header_register' => 'required|string',
            'email' => 'required|string',
            'username' => 'required|string',
            'password' => 'required|string',
            'submit_login' => 'required|string',
            'submit_register' => 'required|string',
            'keterangan_masuk' => 'required|string',
            'keterangan_daftar' => 'required|string'
        ]);

        $data = [
            'id_bahasa' => $decryptedId,
            'kode' => $request->kode,
            'header_login' => $request->header_login,
            'header_register' => $request->header_register,
            'email' => $request->email,
            'username' => $request->username,
            'password' => $request->password,
            'submit_login' => $request->submit_login,
            'submit_register' => $request->submit_register,
            'keterangan_masuk' => $request->keterangan_masuk,
            'keterangan_daftar' => $request->keterangan_daftar,
            'edit_date' => date("Y-m-d H:i:s"), // or use your preferred method to get the current date and time
        ];

        $condition = [
            'id_bahasa' => $decryptedId,
            'kode' => $request->kode,
        ];

        $upsert = Login_lang::updateOrInsert($condition, $data);

        if ($upsert) {
            return redirect()->route('admin.layout.lang', $id)->withSuccess('Succesfully updated Login Layout');
        } else {
            return back()->withSuccess('Failed updated');
        }
    }

    public function home($id)
    {
        $decryptedId = decrypt($id);

        $berita = Language::findOrFail($decryptedId);
        $home = Home_lang::where('id_bahasa', '=', $decryptedId)->first();

        $code = $berita->kode;

        return view('admin.language.home', compact('code', 'id', 'home'));
    }

    public function homeUpsert(Request $request, $id)
    {
        // Decrypt article ID
        $decryptedId = decrypt($id);

        $request->validate([
            'kode' => 'required|string',
            'beli_tiket' => 'required|string',
            'btn_beli_tiket' => 'required|string',
            'welcome' => 'required|string',
            'btn_jelajah' => 'required|string',
            'info_bhc' => 'required|string',
            'info_bhc_desc' => 'required|string',
            'btn_lihat_info' => 'required|string'
        ]);

        $data = [
            'id_bahasa' => $decryptedId,
            'kode' => $request->kode,
            'beli_tiket' => $request->beli_tiket,
            'btn_beli_tiket' => $request->btn_beli_tiket,
            'welcome' => $request->welcome,
            'btn_jelajah' => $request->btn_jelajah,
            'info_bhc' => $request->info_bhc,
            'info_bhc_desc' => $request->info_bhc_desc,
            'btn_lihat_info' => $request->btn_lihat_info,
            'edit_date' => date("Y-m-d H:i:s"), // or use your preferred method to get the current date and time
        ];

        $condition = [
            'id_bahasa' => $decryptedId,
            'kode' => $request->kode,
        ];

        $upsert = Home_lang::updateOrInsert($condition, $data);

        if ($upsert) {
            return redirect()->route('admin.layout.lang', $id)->withSuccess('Succesfully updated Home Layout');
        } else {
            return back()->withSuccess('Failed updated');
        }
    }

    public function event($id)
    {
        $decryptedId = decrypt($id);

        $berita = Language::findOrFail($decryptedId);
        $event = Event_lang::where('id_bahasa', '=', $decryptedId)->first();

        $code = $berita->kode;

        return view('admin.language.event', compact('code', 'id', 'event'));
    }

    public function eventUpsert(Request $request, $id)
    {
        // Decrypt article ID
        $decryptedId = decrypt($id);

        $request->validate([
            'kode' => 'required|string',
            'nodata' => 'required|string',
            'tahun_header' => 'required|string',
            'btn_detail' => 'required|string',
            'januari' => 'required|string',
            'februari' => 'required|string',
            'maret' => 'required|string',
            'april' => 'required|string',
            'mei' => 'required|string',
            'juni' => 'required|string',
            'juli' => 'required|string',
            'agustus' => 'required|string',
            'september' => 'required|string',
            'oktober' => 'required|string',
            'november' => 'required|string',
            'desember' => 'required|string',
            'lainnya' => 'required|string'
        ]);

        $data = [
            'id_bahasa' => $decryptedId,
            'kode' => $request->kode,
            'tanggal' => date("Y-m-d"),
            'nodata' => $request->nodata,
            'tahun_header' => $request->tahun_header,
            'btn_detail' => $request->btn_detail,
            'januari' => $request->januari,
            'februari' => $request->februari,
            'maret' => $request->maret,
            'april' => $request->april,
            'mei' => $request->mei,
            'juni' => $request->juni,
            'juli' => $request->juli,
            'agustus' => $request->agustus,
            'september' => $request->september,
            'oktober' => $request->oktober,
            'november' => $request->november,
            'desember' => $request->desember,
            'lainnya' => $request->lainnya,
            'edit_date' => date("Y-m-d H:i:s"), // or use your preferred method to get the current date and time
        ];

        $condition = [
            'id_bahasa' => $decryptedId,
            'kode' => $request->kode,
        ];

        $upsert = Event_lang::updateOrInsert($condition, $data);

        if ($upsert) {
            return redirect()->route('admin.layout.lang', $id)->withSuccess('Succesfully updated Home Layout');
        } else {
            return back()->withSuccess('Failed updated');
        }
    }

    public function jelajah($id)
    {
        $decryptedId = decrypt($id);

        $berita = Language::findOrFail($decryptedId);
        $jelajah = Jelajah_lang::where('id_bahasa', '=', $decryptedId)->first();

        $code = $berita->kode;

        return view('admin.language.jelajah', compact('code', 'id', 'jelajah'));
    }

    public function jelajahUpsert(Request $request, $id)
    {
        // Decrypt article ID
        $decryptedId = decrypt($id);

        $request->validate([
            'kode' => 'required|string',
            'lainnya' => 'required|string'
        ]);

        $data = [
            'id_bahasa' => $decryptedId,
            'kode' => $request->kode,
            'lainnya' => $request->lainnya,
            'edit_date' => date("Y-m-d H:i:s"), // or use your preferred method to get the current date and time
        ];

        $condition = [
            'id_bahasa' => $decryptedId,
            'kode' => $request->kode,
        ];

        $upsert = Jelajah_lang::updateOrInsert($condition, $data);

        if ($upsert) {
            return redirect()->route('admin.layout.lang', $id)->withSuccess('Succesfully updated Jelajah Layout');
        } else {
            return back()->withSuccess('Failed updated');
        }
    }

    public function info($id)
    {
        $decryptedId = decrypt($id);

        $berita = Language::findOrFail($decryptedId);
        $info = Info_lang::where('id_bahasa', '=', $decryptedId)->first();

        $code = $berita->kode;

        return view('admin.language.info', compact('code', 'id', 'info'));
    }

    public function infoUpsert(Request $request, $id)
    {
        // Decrypt article ID
        $decryptedId = decrypt($id);

        $request->validate([
            'kode' => 'required|string',
            'info' => 'required|string',
            'btn_selengkapnya' => 'required|string',
            'detail' => 'required|string',
            'lainnya' => 'required|string'
        ]);

        $data = [
            'id_bahasa' => $decryptedId,
            'kode' => $request->kode,
            'info' => $request->info,
            'btn_selengkapnya' => $request->btn_selengkapnya,
            'detail' => $request->detail,
            'lainnya' => $request->lainnya,
            'edit_date' => date("Y-m-d H:i:s"), // or use your preferred method to get the current date and time
        ];

        $condition = [
            'id_bahasa' => $decryptedId,
            'kode' => $request->kode,
        ];

        $upsert = Info_lang::updateOrInsert($condition, $data);

        if ($upsert) {
            return redirect()->route('admin.layout.lang', $id)->withSuccess('Succesfully updated Info Layout');
        } else {
            return back()->withSuccess('Failed updated');
        }
    }

    public function contact($id)
    {
        $decryptedId = decrypt($id);

        $berita = Language::findOrFail($decryptedId);
        $contact = Contact_lang::where('id_bahasa', '=', $decryptedId)->first();

        $code = $berita->kode;

        return view('admin.language.contact', compact('code', 'id', 'contact'));
    }

    public function contactUpsert(Request $request, $id)
    {
        // Decrypt article ID
        $decryptedId = decrypt($id);

        $request->validate([
            'kode' => 'required|string',
            'customer' => 'required|string',
            'email' => 'required|string',
            'whatsapp' => 'required|string',
            'social' => 'required|string',
            'kontak_kami' => 'required|string',
            'deskripsi' => 'required|string',
            'nama_lengkap' => 'required|string',
            'bantuan' => 'required|string',
            'btn_kirim' => 'required|string'
        ]);

        $data = [
            'id_bahasa' => $decryptedId,
            'kode' => $request->kode,
            'customer' => $request->customer,
            'email' => $request->email,
            'whatsapp' => $request->whatsapp,
            'social' => $request->social,
            'kontak_kami' => $request->kontak_kami,
            'deskripsi' => $request->deskripsi,
            'nama_lengkap' => $request->nama_lengkap,
            'bantuan' => $request->bantuan,
            'btn_kirim' => $request->btn_kirim,
            'edit_date' => date("Y-m-d H:i:s"), // or use your preferred method to get the current date and time
        ];

        $condition = [
            'id_bahasa' => $decryptedId,
            'kode' => $request->kode,
        ];

        $upsert = Contact_lang::updateOrInsert($condition, $data);

        if ($upsert) {
            return redirect()->route('admin.layout.lang', $id)->withSuccess('Succesfully updated Contact Layout');
        } else {
            return back()->withSuccess('Failed updated');
        }
    }

    public function ticket($id)
    {
        $decryptedId = decrypt($id);

        $berita = Language::findOrFail($decryptedId);
        $ticket = Tickets_lang::where('id_bahasa', '=', $decryptedId)->first();

        $code = $berita->kode;

        return view('admin.language.ticket', compact('code', 'id', 'ticket'));
    }

    public function ticketUpsert(Request $request, $id)
    {
        // Decrypt article ID
        $decryptedId = decrypt($id);

        $request->validate([
            'kode' => 'required|string',
            'header' => 'required|string',
            'btn_tiket' => 'required|string',
            'header_pesan_tiket' => 'required|string'
        ]);

        $data = [
            'id_bahasa' => $decryptedId,
            'kode' => $request->kode,
            'header' => $request->header,
            'btn_tiket' => $request->btn_tiket,
            'header_pesan_tiket' => $request->header_pesan_tiket,
            'edit_date' => date("Y-m-d H:i:s"), // or use your preferred method to get the current date and time
        ];

        $condition = [
            'id_bahasa' => $decryptedId,
            'kode' => $request->kode,
        ];

        $upsert = Tickets_lang::updateOrInsert($condition, $data);

        if ($upsert) {
            return redirect()->route('admin.layout.lang', $id)->withSuccess('Succesfully updated Ticket Layout');
        } else {
            return back()->withSuccess('Failed updated');
        }
    }

    public function promo($id)
    {
        $decryptedId = decrypt($id);

        $berita = Language::findOrFail($decryptedId);
        $promo = Promo_lang::where('id_bahasa', '=', $decryptedId)->first();

        $code = $berita->kode;

        return view('admin.language.promo', compact('code', 'id', 'promo'));
    }

    public function promoUpsert(Request $request, $id)
    {
        // Decrypt article ID
        $decryptedId = decrypt($id);

        $request->validate([
            'kode' => 'required|string',
            'breadcumb' => 'required|string',
            'header' => 'required|string',
            'lainnya' => 'required|string'
        ]);

        $data = [
            'id_bahasa' => $decryptedId,
            'kode' => $request->kode,
            'breadcumb' => $request->breadcumb,
            'header' => $request->header,
            'lainnya' => $request->lainnya,
            'edit_date' => date("Y-m-d H:i:s"), // or use your preferred method to get the current date and time
        ];

        $condition = [
            'id_bahasa' => $decryptedId,
            'kode' => $request->kode,
        ];

        $upsert = Promo_lang::updateOrInsert($condition, $data);

        if ($upsert) {
            return redirect()->route('admin.layout.lang', $id)->withSuccess('Succesfully updated Promo Layout');
        } else {
            return back()->withSuccess('Failed updated');
        }
    }
}
