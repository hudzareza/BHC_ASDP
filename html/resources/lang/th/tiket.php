<?php
error_reporting(0);

$data = App\Models\Tickets_lang::where('kode', "th")->first();
return [
    'header' => $data->header,
    'btn_tiket' => $data->btn_tiket,
    'header_pesan_tiket' => $data->header_pesan_tiket,
];
