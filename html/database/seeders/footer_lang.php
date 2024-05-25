<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class footer_lang extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('footer_lang')->insert([
            'id_bahasa' => '2',
            'kode' => 'id',
            'deskripsi' => 'Kawasan Pelabuhan Penyebrangan, Bakauheni, Kec. Bakauheni, Kabupaten Lampung Selatan, Lampung 35592',
            'halaman' => 'Halaman',
            'kontak_kami' => 'Kontak Kami',
            'email' => 'bakauheniharbourcity@gmail.com',
            'whatsapp' => '081996191191',
            'ikuti_kami' => 'Ikuti Kami',
            'hak_cipta' => 'Hak_cipta@2023 Bakauheni Harbour City',
            'created_at' => '2024-03-05 01:35:47',
            'updated_at' => '2024-03-05 01:46:25',
            'editing' => '0',
            'edit_date' => '2024-03-18 16:53:10'
        ]);


        DB::table('footer_lang')->insert([
            'id_bahasa' => '1',
            'kode' => 'en',
            'deskripsi' => 'ferry port area, Bakauheni, kec. Bakauheni, South Lampung Regency, Lampung 35592',
            'halaman' => 'Page',
            'kontak_kami' => 'Contact us',
            'email' => 'bakauheniharbourcity@gmail.com',
            'whatsapp' => '081996191191',
            'ikuti_kami' => 'Follow us',
            'hak_cipta' => 'Copyright@2023 Bakauheni Harbour City',
            'created_at' => '2024-03-05 01:35:47',
            'updated_at' => '2024-03-05 01:46:25',
            'editing' => '0',
            'edit_date' => '2024-03-18 17:00:18'
        ]);
    }
}
