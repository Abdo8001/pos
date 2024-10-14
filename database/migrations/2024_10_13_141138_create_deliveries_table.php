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
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->string('reference_no');
        $table->foreignId('sale_id')->references('id')->on('sales')->onDelete('cascade');
        $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreignId('courier_id')->references('id')->on('couriers')->onDelete('cascade');

		$table->string('packing_slip_ids')->nullable();
		$table->text('address');
		$table->string('delivered_by')->nullable();
		$table->string('recieved_by')->nullable();
		$table->string('file')->nullable();
		$table->string('note')->nullable();
		$table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliveries');
    }
};
