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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->string('purchase_code');
            $table->date('purchase_date');
            $table->date('due_date');
            $table->float('total_discount');
            $table->float('subtotal_ppn');
            $table->float('total');
            $table->date('payment_date')->nullable();
            $table->enum('purchase_status', ['pending', 'success'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
