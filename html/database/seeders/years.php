<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class years extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('years')->insert([
            'name' => '2020',
        ]);
        DB::table('years')->insert([
            'name' => '2021',
        ]);
        DB::table('years')->insert([
            'name' => '2022',
        ]);
        DB::table('years')->insert([
            'name' => '2023',
        ]);
        DB::table('years')->insert([
            'name' => '2024',
        ]);
        DB::table('years')->insert([
            'name' => '2025',
        ]);
        DB::table('years')->insert([
            'name' => '2026',
        ]);
        DB::table('years')->insert([
            'name' => '2027',
        ]);
        DB::table('years')->insert([
            'name' => '2028',
        ]);
        DB::table('years')->insert([
            'name' => '2029',
        ]);
        DB::table('years')->insert([
            'name' => '2030',
        ]);
        DB::table('years')->insert([
            'name' => '2031',
        ]);
        DB::table('years')->insert([
            'name' => '2032',
        ]);
        DB::table('years')->insert([
            'name' => '2033',
        ]);
        DB::table('years')->insert([
            'name' => '2034',
        ]);
        DB::table('years')->insert([
            'name' => '2035',
        ]);
    }
}
