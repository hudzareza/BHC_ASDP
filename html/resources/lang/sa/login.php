<?php
error_reporting(0);

$data = App\Models\Login_lang::where('kode', "sa")->first();
return [
    'header_login' => $data->header_login,
    'header_register' => $data->header_register,
    'email' => $data->email,
    'username' => $data->username,
    'password' => $data->password,
    'submit_login' => $data->submit_login,
    'submit_register' => $data->submit_register,
    'keterangan_masuk' => $data->keterangan_masuk,
    'keterangan_daftar' => $data->keterangan_daftar,
];
