<?php
error_reporting(0);

$data = App\Models\Profile_lang::where('kode', "my")->first();
return [
    'header' => $data->header,
    'informasi' => $data->informasi,
    'nama' => $data->nama,
    'telepon' => $data->telepon,
    'informasi_akun' => $data->informasi_akun,
    'ganti_password' => $data->ganti_password,
    'password_lama' => $data->password_lama,
    'password_baru' => $data->password_baru,
    'konfirmasi' => $data->konfirmasi,
    'btn' => $data->btn,
];
