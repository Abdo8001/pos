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
        Schema::create('pos_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreignId('warehouse_id')->references('id')->on('warehouses')->onDelete('cascade');
            $table->foreignId('biller_id')->references('id')->on('billers')->onDelete('cascade');
		$table->integer('product_number');
		$table->tinyInteger('keybord_active');
		$table->tinyInteger('is_table')->default('0');
		$table->tinyInteger('send_sms')->default('0');
		$table->string('stripe_public_key')->nullable();
		$table->string('stripe_secret_key')->nullable();
		$table->string('paypal_live_api_username')->nullable();
		$table->string('paypal_live_api_password')->nullable();
		$table->string('paypal_live_api_secret')->nullable();
		$table->text('payment_options')->nullable();
		$table->string('invoice_option')->nullable();
		$table->string('thermal_invoice_size')->default('80');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pos_settings');
    }
};
