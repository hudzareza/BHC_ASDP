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
        Schema::create('goers', function (Blueprint $table) {
            $table->id();
            $table->string('order_number');
            $table->string('item_content');
            $table->string('item_group');
            $table->string('item_name');
            $table->string('item_total');
            $table->string('item_price');
            $table->string('item_total_price');
            $table->string('item_total_tax');
            $table->string('item_total_price_before_tax');
            $table->string('order_by');
            $table->string('status');
            $table->string('schedule_date');
            $table->timestamp('schedule_datetime')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->string('payment_method');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goers');
    }
};
