<?php
error_reporting(0);

$data = App\Models\Navbar_lang::where('kode', "jp")->first();
return [
    'beranda' => $data->beranda,
    'event' => $data->event,
    'jelajah' => $data->jelajah,
    'tiket_promo' => $data->tiket_promo,
    'kontak' => $data->kontak,
    'faq' => $data->faq,
    'bahasa' => $data->bahasa,
    'masuk' => $data->masuk,
];
