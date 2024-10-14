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
            $table->string('reference_no');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('warehouse_id')->references('id')->on('warehouses')->onDelete('cascade');
            $table->foreignId('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
            $table->foreignId('currency_id')->references('id')->on('currencies')->onDelete('cascade');

            $table->float('exchange_rate')->nullable();//;
            $table->integer('item');
            $table->integer('total_qty');
            $table->float('total_discount');
            $table->float('total_tax');
            $table->float('total_cost');
            $table->float('order_tax_rate')->nullable();//;
            $table->float('order_tax')->nullable();//;
            $table->float('order_discount')->nullable();//;
            $table->float('shipping_cost')->nullable();//;
            $table->float('grand_total');
            $table->float('paid_amount');
            $table->integer('status');
            $table->integer('payment_status');
            $table->string('document')->nullable();//;
            $table->text('note')->nullable();//;
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
