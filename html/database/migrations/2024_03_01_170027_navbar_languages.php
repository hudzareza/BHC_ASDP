<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('navbar_lang', function (Blueprint $table) {
            $table->id();
            $table->string('id_bahasa');
            $table->string('kode')->nullable();
            $table->string('beranda');
            $table->string('event');
            $table->string('jelajah');
            $table->string('tiket_promo');
            $table->string('kontak');
            $table->string('faq');
            $table->string('bahasa');
            $table->string('masuk');
            $table->timestamps();
            $table->timestamp('edit_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('navbar_lang');
    }
};
