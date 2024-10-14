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
        Schema::create('product_sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sale_id')->references('id')->on('sales')->onDelete('cascade');
            $table->foreignId('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreignId('product_batch_id')->references('id')->on('product_batches')->onDelete('cascade');
            $table->foreignId('variant_id')->references('id')->on('variants')->onDelete('cascade');

            $table->text('imei_number')->nullable();//;
            $table->float('qty');
            $table->float('return_qty')->default('0');
            $table->integer('sale_unit_id');
            $table->float('net_unit_price');
            $table->float('discount');
            $table->float('tax_rate');
            $table->float('tax');
            $table->float('total');

            $table->tinyInteger('is_delivered')->nullable();//;
            $table->tinyInteger('is_packing')->nullable();//;
    
    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_sales');
    }
};
