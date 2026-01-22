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
        Schema::create('purchase_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('purchase_id')->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('product_id')->constrained()->cascadeOnDelete();
            $table->decimal('purchase_price', 10, 2)->default(0);
            $table->decimal('amount', 10, 2)->default(0);
            $table->decimal('sub_total', 10, 2)->default(0);
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_details');
    }
};
