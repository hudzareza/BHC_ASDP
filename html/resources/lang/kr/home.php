<?php
error_reporting(0);

$data = App\Models\Home_lang::where('kode', "kr")->first();
return [
    'beli_tiket' => $data->beli_tiket,
    'btn_beli_tiket' => $data->btn_beli_tiket,
    'welcome' => $data->welcome,
    'btn_jelajah' => $data->btn_jelajah,
    'info_bhc' => $data->info_bhc,
    'info_bhc_desc' => $data->info_bhc_desc,
    'btn_lihat_info' => $data->btn_lihat_info,
];
