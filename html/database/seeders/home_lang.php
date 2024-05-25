<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class home_lang extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('home_lang')->insert([
            'id_bahasa' => '2',
            'kode' => 'id',
            'beli_tiket' => 'Beli Tiket Sekarang :',
            'btn_beli_tiket' => 'Beli Tiket',
            'welcome' => 'Selamat Datang di',
            'btn_jelajah' => 'Eksplorasi',
            'info_bhc' => 'Info BHC',
            'info_bhc_desc' => 'Informasi Terbaru & Artikel BHC',
            'btn_lihat_info' => 'Lihat Semua',
            'created_at' => '2024-03-05 01:35:47',
            'updated_at' => '2024-03-05 01:46:25',
            'editing' => '0',
            'edit_date' => '2024-03-18 16:53:10'
        ]);


        DB::table('home_lang')->insert([
            'id_bahasa' => '1',
            'kode' => 'en',
            'beli_tiket' => 'Buy Tickets Now :',
            'btn_beli_tiket' => 'Buy Tickets',
            'welcome' => 'Welcome to',
            'btn_jelajah' => 'Explore',
            'info_bhc' => 'BHC info',
            'info_bhc_desc' => 'Latest Information & BHC Articles',
            'btn_lihat_info' => 'See All',
            'created_at' => '2024-03-05 01:35:47',
            'updated_at' => '2024-03-05 01:46:25',
            'editing' => '0',
            'edit_date' => '2024-03-18 17:00:18'
        ]);
    }
}
