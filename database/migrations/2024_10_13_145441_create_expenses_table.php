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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->string('reference_no');
            $table->foreignId('expense_category_id')->references('id')->on('expense_categories')->onDelete('cascade');
            $table->double('amount');
            $table->foreignId('warehouse_id')->references('id')->on('warehouses')->onDelete('cascade');
           $table->foreignId('account_id')->references('id')->on('accounts')->onDelete('cascade');
           $table->foreignId('cash_register_id')->references('id')->on('cash_registers')->onDelete('cascade');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
