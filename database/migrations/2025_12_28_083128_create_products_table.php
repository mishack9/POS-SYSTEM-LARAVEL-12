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
            $table->string('product_name')->unique();
            $table->unsignedBigInteger('category_id')->constrained()->cascadeOnDelete();
            $table->string('slug')->unique();
            $table->string('image');
            $table->string('product_code')->nullable();
            $table->string('brand')->nullable();
            $table->string('purchase_price', 10, 2)->default(0);
            $table->string('selling_price', 10, 2);
            $table->string('discount', 10, 2)->default(0);
            $table->string('stock')->default(0);
            $table->text('description')->nullable();
            $table->tinyInteger('status')->default(0);
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
