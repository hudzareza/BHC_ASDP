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
        Schema::create('event_list_lang', function (Blueprint $table) {
            $table->id();
            $table->string('id_bahasa');
            $table->string('kode')->nullable();
            $table->string('tanggal');
            $table->string('nodata');
            $table->string('tahun_header');
            $table->string('btn_detail');
            $table->string('januari');
            $table->string('februari');
            $table->string('maret');
            $table->string('april');
            $table->string('mei');
            $table->string('juni');
            $table->string('juli');
            $table->string('agustus');
            $table->string('september');
            $table->string('oktober');
            $table->string('november');
            $table->string('desember');
            $table->string('lainnya');
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
        Schema::dropIfExists('event_list_lang');
    }
};
