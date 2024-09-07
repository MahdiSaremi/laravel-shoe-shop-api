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
        Schema::table('product_images', function (Blueprint $table) {
            $table->foreign('product_id', 'product_images_product_id_foreign')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('file_id', 'product_images_file_id_foreign')->references('id')->on('files')->onDelete('cascade');
            $table->foreign('color_id', 'product_images_color_id_foreign')->references('id')->on('product_colors')->onDelete('set null');
            $table->foreign('size_id', 'product_images_size_id_foreign')->references('id')->on('product_sizes')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_images', function (Blueprint $table) {
            $table->dropIndex('product_images_size_id_foreign');
            $table->dropIndex('product_images_color_id_foreign');
            $table->dropIndex('product_images_file_id_foreign');
            $table->dropIndex('product_images_product_id_foreign');
        });
    }
};
