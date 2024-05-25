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
        Schema::create('profile_lang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_bahasa');
            $table->foreign('id_bahasa')->references('id')->on('languages')->onDelete('cascade');
            $table->string('kode')->nullable();
            $table->string('header');
            $table->string('informasi');
            $table->string('nama');
            $table->string('telepon');
            $table->string('informasi_akun');
            $table->string('ganti_password');
            $table->string('password_lama');
            $table->string('password_baru');
            $table->string('konfirmasi');
            $table->string('btn');
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
        Schema::dropIfExists('profile_lang');
    }
};
