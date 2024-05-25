<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class info_lang extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('info_lang')->insert([
            'id_bahasa' => '2',
            'kode' => 'id',
            'info' => 'Info BHC',
            'btn_selengkapnya' => 'Selengkapnya',
            'detail' => 'Detil',
            'lainnya' => 'Info Lainnya',
            'created_at' => '2024-03-05 01:35:47',
            'updated_at' => '2024-03-05 01:46:25',
            'editing' => '0',
            'edit_date' => '2024-03-18 16:53:10'
        ]);


        DB::table('info_lang')->insert([
            'id_bahasa' => '1',
            'kode' => 'en',
            'info' => 'BHC info',
            'btn_selengkapnya' => 'More',
            'detail' => 'Detail',
            'lainnya' => 'Other Info',
            'created_at' => '2024-03-05 01:35:47',
            'updated_at' => '2024-03-05 01:46:25',
            'editing' => '0',
            'edit_date' => '2024-03-18 17:00:18'
        ]);
    }
}
