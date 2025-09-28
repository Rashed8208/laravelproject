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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('coupon_id')->nullable();
            $table->bigInteger('customer_id')->nullable();
            $table->string('status')->nullable();
            $table->decimal('discount_amount')->nullable();
            $table->decimal('total_price',10,2)->nullable();
            $table->decimal('final_price',10,2)->nullable();
            $table->bigInteger('district_id')->nullable();
            $table->bigInteger('division_id')->nullable();
            $table->text('notes')->nullable();
            $table->text('address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
