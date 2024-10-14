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
        Schema::create('transfers', function (Blueprint $table) {
            $table->id();
            $table->string('reference_no');
        $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');

		$table->integer('status');
        $table->foreignId('from_warehouse_id')->references('id')->on('warehouses')->onDelete('cascade');
        $table->foreignId('to_warehouse_id')->references('id')->on('warehouses')->onDelete('cascade');
		$table->integer('item');
		$table->float('total_qty');
		$table->float('total_tax');
		$table->float('total_cost');
		$table->float('shipping_cost')->nullable();
		$table->float('grand_total');
		$table->string('document')->nullable();
		$table->text('note')->nullable();
		$table->tinyInteger('is_sent')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfers');
    }
};
