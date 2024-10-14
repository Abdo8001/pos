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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
         $table->integer('customer_group_id')->nullable();
         $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
         $table->string('name');
		$table->string('company_name')->nullable();
		$table->string('email')->nullable();
		$table->string('phone_number');
		$table->string('tax_no')->nullable();
		$table->string('address')->nullable();
		$table->string('city')->nullable();
		$table->string('state')->nullable();
		$table->string('postal_code')->nullable();
		$table->string('country')->nullable();
		$table->float('points')->nullable();
		$table->tinyInteger('is_active')->nullable();
	
		$table->float('deposit')->nullable();
		$table->float('expense')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
