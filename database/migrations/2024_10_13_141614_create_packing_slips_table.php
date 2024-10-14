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
        Schema::create('packing_slips', function (Blueprint $table) {
            $table->id();
            $table->string('reference_no');
            $table->foreignId('sale_id')->references('id')->on('sales')->onDelete('cascade');
            $table->foreignId('delivery_id')->references('id')->on('deliveries')->onDelete('cascade');
            $table->double('amount');
            $table->string('status');
            $table->timestamps();
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packing_slips');
    }
};
