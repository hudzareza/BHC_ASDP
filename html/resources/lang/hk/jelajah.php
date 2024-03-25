<?php
error_reporting(0);

$data = App\Models\Jelajah_lang::where('kode', "hk")->first();
return [
    'lainnya' => $data->lainnya,
];
