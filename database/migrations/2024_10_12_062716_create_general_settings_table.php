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
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_title');
            $table->string('site_logo')->nullable();
            $table->tinyInteger('is_rtl')->nullable();
            $table->string('currency');
            $table->integer('package_id')->nullable();
            $table->string('subscription_type')->nullable();
            $table->string('staff_access');
            $table->string('without_stock')->default('no');
            $table->string('date_format');
            $table->string('developed_by')->nullable();
            $table->string('invoice_format')->nullable();
            $table->integer('decimal')->default('2');
            $table->integer('state')->nullable();
            $table->string('theme');
            $table->text('modules')->nullable();
            $table->string('currency_position');
            $table->date('expiry_date')->nullable();
            $table->string('expiry_type')->default('days');
            $table->string('expiry_value')->default('0');
            $table->tinyInteger('is_zatca')->nullable();
            $table->string('company_name')->nullable();
            $table->string('vat_registration_number')->nullable();
            $table->tinyInteger('is_packing_slip')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_settings');
    }
};
