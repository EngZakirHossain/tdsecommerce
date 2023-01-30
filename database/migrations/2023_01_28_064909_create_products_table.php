<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subCategory_id')->constrained('sub_categories','id')->onDelete('cascade');
            $table->string('product_name');
            $table->string('slug');
            $table->string('product_sku')->unique();
            $table->string('product_size')->nullable();
            $table->unsignedFloat('product_price')->default(0);
            $table->unsignedFloat('product_cost')->default(0);
            $table->unsignedInteger('product_stock')->default(0);
            $table->unsignedInteger('product_alertQuantity')->default(3);
            $table->longText('product_details')->nullable();
            $table->longText('product_shippingDetails')->nullable();
            $table->string('product_thumbnail')->default('product_thumbnail.jpg');
            $table->unsignedSmallInteger('product_rating')->nullable()->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
