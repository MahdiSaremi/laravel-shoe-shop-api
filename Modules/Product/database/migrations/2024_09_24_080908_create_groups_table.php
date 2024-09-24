<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Product\Models\Image;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('name', 20);
            $table->string('code', 10);
            $table->string('slug', 50);
            $table->foreignId('image_id')->nullable()
                ->constrained()->nullOnDelete();
            $table->foreignId('parent_id')->nullable();
            $table->timestamps();
        });

        Schema::table('groups', function (Blueprint $table) {
            $table->foreign('parent_id')
                ->references('id')->on('groups')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
