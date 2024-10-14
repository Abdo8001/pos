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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
		$table->string('email');
		$table->string('phone_number');
		
        $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreignId('department_id')->references('id')->on('departments')->onDelete('cascade');

		$table->string('staff_id',191)->nullable();//;
		$table->string('image')->nullable();//;
		$table->string('address')->nullable();//;
		$table->string('city')->nullable();//;
		$table->string('country')->nullable();//;
		$table->tinyInteger('is_active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
