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
        Schema::create('return_products', function (Blueprint $table) {
            $table->id();
            $table->string('reference_no');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('warehouse_id')->references('id')->on('warehouses')->onDelete('cascade');
            $table->foreignId('sale_id')->references('id')->on('sales')->onDelete('cascade');
            $table->foreignId('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreignId('account_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->foreignId('currency_id')->references('id')->on('currencies')->onDelete('cascade');
            $table->foreignId('cash_register_id')->references('id')->on('cash_registers')->onDelete('cascade');
            $table->foreignId('biller_id')->references('id')->on('billers')->onDelete('cascade');
    
            $table->float('exchange_rate')->nullable();//;
            $table->integer('item');
            $table->float('total_qty');
            $table->float('total_discount');
            $table->float('total_tax');
            $table->float('total_price');
            $table->float('order_tax_rate')->nullable();//;
            $table->float('order_tax')->nullable();//;
            $table->float('grand_total');
            $table->string('document')->nullable();//;
            $table->text('return_note')->nullable();//;
            $table->text('staff_note')->nullable();//;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('return_products');
    }
};
