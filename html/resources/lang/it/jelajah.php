<?php
error_reporting(0);

$data = App\Models\Jelajah_lang::where('kode', "it")->first();
return [
    'lainnya' => $data->lainnya,
];
