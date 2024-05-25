<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ticket_lang extends Seeder
{


    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ticket_lang')->insert([
            'id_bahasa' => '2',
            'kode' => 'id',
            'header' => 'Tiket',
            'btn_tiket' => 'Beli Tiket',
            'header_pesan_tiket' => 'Pesan Tiket',
            'created_at' => '2024-03-05 01:35:47',
            'updated_at' => '2024-03-05 01:46:25',
            'editing' => '0',
            'edit_date' => '2024-03-18 16:53:10'
        ]);


        DB::table('ticket_lang')->insert([
            'id_bahasa' => '1',
            'kode' => 'en',
            'header' => 'Ticket',
            'btn_tiket' => 'Buy Ticket',
            'header_pesan_tiket' => 'Order a Ticket',
            'created_at' => '2024-03-05 01:35:47',
            'updated_at' => '2024-03-05 01:46:25',
            'editing' => '0',
            'edit_date' => '2024-03-18 17:00:18'
        ]);
    }
}
