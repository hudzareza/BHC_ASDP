<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class language extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('languages')->insert([
            'name' => 'Bahasa Inggris',
            'alias' => 'English',
            'kode' => 'en'
        ]);


        DB::table('languages')->insert([
            'name' => 'Bahasa Indonesia',
            'alias' => 'Indonesia',
            'kode' => 'id'
        ]);
    }
}
