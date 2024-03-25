<?php
error_reporting(0);

$data = App\Models\Jelajah_lang::where('kode', "fr")->first();
return [
    'lainnya' => $data->lainnya,
];
