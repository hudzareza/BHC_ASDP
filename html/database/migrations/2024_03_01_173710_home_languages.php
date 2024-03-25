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
        Schema::create('home_lang', function (Blueprint $table) {
            $table->id();
            $table->string('id_bahasa');
            $table->string('kode')->nullable();
            $table->string('beli_tiket');
            $table->string('btn_beli_tiket');
            $table->string('welcome');
            $table->string('btn_jelajah');
            $table->string('info_bhc');
            $table->string('info_bhc_desc');
            $table->string('btn_lihat_info');
            $table->timestamps();
            $table->enum('editing', ['0', '1'])->default('0');
            $table->timestamp('edit_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_lang');
    }
};
