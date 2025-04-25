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
        Schema::create('booking_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('booking_trx_id');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('proof');
            $table->string('post_code');
            $table->string('city');
            $table->text('address');
            $table->unsignedBigInteger('quantity');
            $table->unsignedBigInteger('sub_total_amount');
            $table->unsignedBigInteger('total_amount');
            $table->unsignedBigInteger('total_tax_amount');
            $table->boolean('is_paid');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_transactions');
    }
};
