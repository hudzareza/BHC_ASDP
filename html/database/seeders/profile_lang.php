<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class profile_lang extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('profile_lang')->insert([
            'id_bahasa' => '2',
            'kode' => 'id',
            'header' => 'Profil',
            'informasi' => 'Informasi',
            'nama' => 'Nama',
            'telepon' => 'Nomor Telepon',
            'informasi_akun' => 'Informasi Akun',
            'ganti_password' => 'Ganti Password',
            'password_lama' => 'Password Lama',
            'password_baru' => 'Password Baru',
            'konfirmasi' => 'Konfirmasi',
            'btn' => 'Simpan',
            'created_at' => '2024-03-05 01:35:47',
            'updated_at' => '2024-03-05 01:46:25',
            'editing' => '0',
            'edit_date' => '2024-03-18 16:53:10'
        ]);


        DB::table('profile_lang')->insert([
            'id_bahasa' => '1',
            'kode' => 'en',
            'header' => 'Profile',
            'informasi' => 'Information',
            'nama' => 'Name',
            'telepon' => 'Phone Number',
            'informasi_akun' => 'Account Information',
            'ganti_password' => 'Change Password',
            'password_lama' => 'Old Password',
            'password_baru' => 'New Password',
            'konfirmasi' => 'Confirmation',
            'btn' => 'Save',
            'created_at' => '2024-03-05 01:35:47',
            'updated_at' => '2024-03-05 01:46:25',
            'editing' => '0',
            'edit_date' => '2024-03-18 17:00:18'
        ]);
    }
}
