<?php
error_reporting(0);

$data = App\Models\Event_lang::where('kode', "in")->first();
return [
    'tanggal' => $data->tanggal,
    'nodata' => $data->nodata,
    'tahun_header' => $data->tahun_header,
    'btn_detail' => $data->btn_detail,
    'januari' => $data->januari,
    'februari' => $data->februari,
    'maret' => $data->maret,
    'april' => $data->april,
    'mei' => $data->mei,
    'juni' => $data->juni,
    'juli' => $data->juli,
    'agustus' => $data->agustus,
    'september' => $data->september,
    'oktober' => $data->oktober,
    'november' => $data->november,
    'desember' => $data->desember,
    'lainnya' => $data->lainnya,
];
