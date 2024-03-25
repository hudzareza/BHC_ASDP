<?php
error_reporting(0);

$data = App\Models\Info_lang::where('kode', "it")->first();
return [
    'info' => $data->info,
    'btn_selengkapnya' => $data->btn_selengkapnya,
    'detail' => $data->detail,
    'lainnya' => $data->lainnya,
];
