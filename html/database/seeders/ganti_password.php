<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ganti_password extends Seeder
{
    /**
     * Run the database seeds.
     */
    

    public function run(): void
    {
        $email = 'hudzaifah@gmail.com'; //email yang mau dirubah passwordnya
        $password = '1234@Pay'; //password yang mau dirubah

        DB::table('users')->updateOrInsert(
            ['email' => $email],
            [
                'password' => Hash::make($password),
            ]
        );
    }
}
