<?php
error_reporting(0);

$data = App\Models\Contact_lang::where('kode', "mm")->first();
return [
    'customer' => $data->customer,
    'email' => $data->email,
    'whatsapp' => $data->whatsapp,
    'social' => $data->social,
    'kontak_kami' => $data->kontak_kami,
    'deskripsi' => $data->deskripsi,
    'nama_lengkap' => $data->nama_lengkap,
    'bantuan' => $data->bantuan,
    'btn_kirim' => $data->btn_kirim,
];
