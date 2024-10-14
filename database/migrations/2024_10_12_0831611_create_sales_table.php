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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('reference_no');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
		//$table->foreignId('cash_register_id')->references('id')->on('cash_registers')->onDelete('cascade');
		//$table->integer('cash_register_id'); 
		//$table->foreign('cash_register_id')->references('id')->on('cash_registers')->onDelete('cascade');

		$table->integer('table_id',)->nullable();//;
		$table->integer('queue')->nullable();//;
        $table->foreignId('customer_id')->references('id')->on('customers')->onDelete('cascade');
        $table->foreignId('warehouse_id')->references('id')->on('warehouses')->onDelete('cascade');
		$table->integer('biller_id');
		$table->integer('item');
		$table->float('total_qty');
		$table->float('total_discount');
		$table->float('total_tax');
		$table->float('total_price');
		$table->float('grand_total');
		$table->integer('currency_id',)->nullable();//;
		$table->float('exchange_rate')->nullable();//;
		$table->float('order_tax_rate')->nullable();//;
		$table->float('order_tax')->nullable();//;
		$table->string('order_discount_type')->nullable();//;
		$table->float('order_discount_value')->nullable();//;
		$table->float('order_discount')->nullable();//;
		$table->foreignId('coupon_id')->references('id')->on('coupons')->onDelete('cascade');
		$table->float('coupon_discount')->nullable();//;
		$table->float('shipping_cost')->nullable();//;
		$table->integer('sale_status');
		$table->integer('payment_status');
		$table->string('document')->nullable();//;
		$table->float('paid_amount')->nullable();//;
		$table->text('sale_note')->nullable();//;
		$table->text('staff_note')->nullable();//;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
