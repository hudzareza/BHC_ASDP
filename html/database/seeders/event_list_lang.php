<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class event_list_lang extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('event_list_lang')->insert([
            'id_bahasa' => '2',
            'kode' => 'id',
            'tanggal' => date("Y-m-d"),
            'nodata' => 'Data tidak ditemukan',
            'tahun_header' => 'Tahun',
            'btn_detail' => 'Detil',
            'januari' => 'Januari',
            'februari' => 'Februari',
            'maret' => 'Maret',
            'april' => 'April',
            'mei' => 'Mei',
            'juni' => 'Juni',
            'juli' => 'Juli',
            'agustus' => 'Agustus',
            'september' => 'September',
            'oktober' => 'Oktober',
            'november' => 'November',
            'desember' => 'Desember',
            'lainnya' => 'Acara Lainnya',
            'created_at' => '2024-03-05 01:35:47',
            'updated_at' => '2024-03-05 01:46:25',
            'editing' => '0',
            'edit_date' => '2024-03-18 16:53:10'
        ]);


        DB::table('event_list_lang')->insert([
            'id_bahasa' => '1',
            'kode' => 'en',
            'tanggal' => date("Y-m-d"),
            'nodata' => 'Data not found',
            'tahun_header' => 'Year',
            'btn_detail' => 'Details',
            'januari' => 'January',
            'februari' => 'February',
            'maret' => 'March',
            'april' => 'April',
            'mei' => 'May',
            'juni' => 'June',
            'juli' => 'July',
            'agustus' => 'August',
            'september' => 'September',
            'oktober' => 'October',
            'november' => 'November',
            'desember' => 'December',
            'lainnya' => 'Other Events',
            'created_at' => '2024-03-05 01:35:47',
            'updated_at' => '2024-03-05 01:46:25',
            'editing' => '0',
            'edit_date' => '2024-03-18 17:00:18'
        ]);
    }
}
