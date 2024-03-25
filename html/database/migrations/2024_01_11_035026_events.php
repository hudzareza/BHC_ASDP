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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('photo');
            $table->text('content');
            $table->string('month');
            $table->string('year');
            $table->enum('editing', ['0', '1'])->default('0');
            $table->enum('approved', ['0', '1'])->default('0');
            $table->enum('deleted', ['0', '1'])->default('0');
            $table->timestamps();
            $table->timestamp('approved_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->string('created_by');
            $table->string('approved_by');
            $table->string('updated_by');
            $table->string('deleted_by');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
