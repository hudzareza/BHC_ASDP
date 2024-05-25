<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class contact_lang extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contact_lang')->insert([
            'id_bahasa' => '2',
            'kode' => 'id',
            'customer' => 'Customer Service',
            'email' => 'Email',
            'whatsapp' => 'Whatsapp',
            'social' => 'Media Sosial',
            'kontak_kami' => 'Kontak Kami',
            'deskripsi' => 'Untuk pertanyaan lebih lanjut, termasuk peluang kemitraan, silakan kirim email ke bakauheniharbourcity@gmail.com atau hubungi menggunakan formulir kontak kami.',
            'nama_lengkap' => 'Nama Lengkap',
            'bantuan' => 'Apa yang dapat kami bantu?',
            'btn_kirim' => 'Kirim Pesan',
            'created_at' => '2024-03-05 01:35:47',
            'updated_at' => '2024-03-05 01:46:25',
            'editing' => '0',
            'edit_date' => '2024-03-18 16:53:10'
        ]);


        DB::table('contact_lang')->insert([
            'id_bahasa' => '1',
            'kode' => 'en',
            'customer' => 'Customer Service',
            'email' => 'Email',
            'whatsapp' => 'Whatsapp',
            'social' => 'Social Media',
            'kontak_kami' => 'Contact Us',
            'deskripsi' => 'For further inquiries, including partnership opportunities, please email bakauheniharbourcity@gmail.com or get in touch using our contact form.',
            'nama_lengkap' => 'Full Name',
            'bantuan' => 'How can we help?',
            'btn_kirim' => 'Send Message',
            'created_at' => '2024-03-05 01:35:47',
            'updated_at' => '2024-03-05 01:46:25',
            'editing' => '0',
            'edit_date' => '2024-03-18 17:00:18'
        ]);
    }
}
