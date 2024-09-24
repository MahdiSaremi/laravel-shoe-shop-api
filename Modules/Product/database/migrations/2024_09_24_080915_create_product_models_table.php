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
        Schema::create('product_models', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')
                ->constrained()->cascadeOnDelete();
            $table->foreignId('color_id')->nullable()
                ->constrained()->nullOnDelete();
            $table->foreignId('image_id')->nullable()
                ->constrained()->nullOnDelete();
            $table->string('code', 10);
            $table->string('size', 2);
            $table->unsignedInteger('stock')->default(0);
            $table->discount();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_models');
    }
};
