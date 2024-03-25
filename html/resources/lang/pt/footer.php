<?php
error_reporting(0);

$data = App\Models\Footer_lang::where('kode', "pt")->first();
return [
    'deskripsi' => $data->deskripsi,
    'halaman' => $data->halaman,
    'kontak_kami' => $data->kontak_kami,
    'email' => $data->email,
    'whatsapp' => $data->whatsapp,
    'ikuti_kami' => $data->ikuti_kami,
    'hak_cipta' => $data->hak_cipta,
];
