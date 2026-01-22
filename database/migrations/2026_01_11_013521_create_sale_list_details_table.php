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
        Schema::create('sale_list_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sales_id')->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('product_id')->constrained()->cascadeOnDelete();
            $table->decimal('selling_price', 10, 2)->default(0);
            $table->decimal('amount', 10, 2)->default(0);
            $table->decimal('discount', 10, 2)->nullable(0);
            $table->decimal('sub_total', 10, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_list_details');
    }
};
