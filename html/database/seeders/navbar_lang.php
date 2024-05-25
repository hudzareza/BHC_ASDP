<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class navbar_lang extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('navbar_lang')->insert([
            'id_bahasa' => '2',
            'kode' => 'id',
            'beranda' => 'Beranda',
            'event' => 'Kalender Acara',
            'jelajah' => 'Jelajah BHC',
            'tiket_promo' => 'Tiket & Promo',
            'kontak' => 'Kontak',
            'faq' => 'FAQ',
            'bahasa' => 'Bahasa',
            'masuk' => 'Masuk',
            'created_at' => '2024-03-05 01:35:47',
            'updated_at' => '2024-03-05 01:46:25',
            'editing' => '0',
            'edit_date' => '2024-03-18 16:53:10'
        ]);


        DB::table('navbar_lang')->insert([
            'id_bahasa' => '1',
            'kode' => 'en',
            'beranda' => 'Home',
            'event' => 'Event Calendar',
            'jelajah' => 'BHC Explore',
            'tiket_promo' => 'Tickets and Promos',
            'kontak' => 'Contact',
            'faq' => 'FAQ',
            'bahasa' => 'Language',
            'masuk' => 'Login',
            'created_at' => '2024-03-05 01:35:47',
            'updated_at' => '2024-03-05 01:46:25',
            'editing' => '0',
            'edit_date' => '2024-03-18 17:00:18'
        ]);
    }
}
