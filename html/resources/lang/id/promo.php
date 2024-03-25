<?php
error_reporting(0);

$data = App\Models\Promo_lang::where('kode', "id")->first();
return [
    'breadcumb' => $data->breadcumb,
    'header' => $data->header,
    'lainnya' => $data->lainnya,
];
