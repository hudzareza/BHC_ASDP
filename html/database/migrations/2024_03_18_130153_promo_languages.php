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
        Schema::create('promo_lang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_bahasa');
            $table->foreign('id_bahasa')->references('id')->on('languages')->onDelete('cascade');
            $table->string('kode')->nullable();
            $table->string('breadcumb');
            $table->string('header');
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
        Schema::dropIfExists('promo_lang');
    }
};
