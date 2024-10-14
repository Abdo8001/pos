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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
		$table->string('code');
		$table->string('type');
		$table->string('barcode_symbology');
        $table->foreignId('category_id')->references('id')->on('categories')->onDelete('cascade');
        $table->foreignId('brand_id')->references('id')->on('brands')->onDelete('cascade');
        $table->foreignId('unit_id')->references('id')->on('units')->onDelete('cascade');

		$table->integer('purchase_unit_id');
		$table->integer('sale_unit_id');
		$table->float('cost');
		$table->float('price');
		$table->float('wholesale_price')->nullable();//;
		$table->float('qty')->nullable();//;
		$table->float('alert_quantity')->nullable();//;
		$table->float('daily_sale_objective')->nullable();//;
		$table->tinyInteger('promotion')->nullable();//;
		$table->string('promotion_price')->nullable();//;
		$table->date('starting_date')->nullable();//;
		$table->date('last_date')->nullable();//;
		$table->integer('tax_id')->nullable();//;
		$table->integer('tax_method')->nullable();//;
		
		$table->string('file')->nullable();//;
		$table->string('image')->nullable();//;
		$table->tinyInteger('is_embeded')->nullable();//;
		$table->tinyInteger('is_variant')->nullable();//;
		$table->tinyInteger('is_batch')->nullable();//;
		$table->tinyInteger('is_diffPrice')->nullable();//;
		$table->tinyInteger('is_imei')->nullable();//;
		$table->tinyInteger('featured')->nullable();//;
		$table->string('product_list')->nullable();//;
		$table->string('variant_list')->nullable();//;
		$table->string('qty_list')->nullable();//;
		$table->string('price_list')->nullable();//;
		$table->text('product_details')->nullable();//;
		$table->text('variant_option')->nullable();//;
		$table->text('variant_value')->nullable();//;
		$table->tinyInteger('is_active')->nullable();//;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
