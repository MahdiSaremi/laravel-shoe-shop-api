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
            $table->foreignId('group_id')->nullable()
                ->constrained()->nullOnDelete();
            $table->foreignId('image_id')->nullable()
                ->constrained()->nullOnDelete();
            $table->string('name', 20);
            $table->string('code', 6);
            $table->text('description');
            $table->text('features');
            $table->unsignedBigInteger('price');
            $table->string('slug', 50);
            $table->decimal('rating', 3, 1)->default(0);
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
