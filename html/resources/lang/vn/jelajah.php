<?php
error_reporting(0);

$data = App\Models\Jelajah_lang::where('kode', "vn")->first();
return [
    'lainnya' => $data->lainnya,
];
