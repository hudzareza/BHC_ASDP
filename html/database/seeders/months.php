<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class months extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('months')->insert([
            'name' => 'Januari',
        ]);
        DB::table('months')->insert([
            'name' => 'Februari',
        ]);
        DB::table('months')->insert([
            'name' => 'Maret',
        ]);
        DB::table('months')->insert([
            'name' => 'April',
        ]);
        DB::table('months')->insert([
            'name' => 'Mei',
        ]);
        DB::table('months')->insert([
            'name' => 'Juni',
        ]);
        DB::table('months')->insert([
            'name' => 'Juli',
        ]);
        DB::table('months')->insert([
            'name' => 'Agustus',
        ]);
        DB::table('months')->insert([
            'name' => 'September',
        ]);
        DB::table('months')->insert([
            'name' => 'Oktober',
        ]);
        DB::table('months')->insert([
            'name' => 'November',
        ]);
        DB::table('months')->insert([
            'name' => 'Desember',
        ]);
    }
}
