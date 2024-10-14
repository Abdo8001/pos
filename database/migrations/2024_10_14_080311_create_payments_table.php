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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
    
		$table->string('payment_receiver')->nullable();//;
		$table->string('payment_reference');
        $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreignId('purchase_id')->references('id')->on('purchases')->onDelete('cascade');
        $table->foreignId('cash_register_id')->references('id')->on('cash_registers')->onDelete('cascade');
        $table->foreignId('account_id')->references('id')->on('accounts')->onDelete('cascade');
        $table->foreignId('sale_id')->references('id')->on('sales')->onDelete('cascade');

		$table->float('amount');
		$table->float('used_points')->nullable();//;
		$table->string('paying_method');
		$table->text('payment_note')->nullable();//;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
