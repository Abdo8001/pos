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
        Schema::create('reward_point_settings', function (Blueprint $table) {
            $table->id();
            $table->double('per_point_amount');
            $table->double('minimum_amount');
            $table->integer('duration')->nullable();
            $table->string('type')->nullable();
            $table->boolean('is_active');
            $table->timestamps();
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reward_point_settings');
    }
};
