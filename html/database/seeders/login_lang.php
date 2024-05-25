<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class login_lang extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('login_lang')->insert([
            'id_bahasa' => '2',
            'kode' => 'id',
            'header_login' => 'Masuk',
            'header_register' => 'Daftar',
            'email' => 'Email',
            'username' => 'Nama Pengguna',
            'password' => 'Kata Sandi',
            'submit_login' => 'Masuk',
            'submit_register' => 'Daftar',
            'keterangan_masuk' => 'Belum Punya Akun?',
            'keterangan_daftar' => 'Sudah Punya Akun?',
            'created_at' => '2024-03-05 01:35:47',
            'updated_at' => '2024-03-05 01:46:25',
            'editing' => '0',
            'edit_date' => '2024-03-18 16:53:10'
        ]);


        DB::table('login_lang')->insert([
            'id_bahasa' => '1',
            'kode' => 'en',
            'header_login' => 'Login',
            'header_register' => 'Register',
            'email' => 'Email',
            'username' => 'Username',
            'password' => 'Password',
            'submit_login' => 'Login',
            'submit_register' => 'Register',
            'keterangan_masuk' => "Don't have an account yet?",
            'keterangan_daftar' => 'Already Have an Account?',
            'created_at' => '2024-03-05 01:35:47',
            'updated_at' => '2024-03-05 01:46:25',
            'editing' => '0',
            'edit_date' => '2024-03-18 17:00:18'
        ]);
    }
}
