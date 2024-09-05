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
        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('user_id', 'orders_user_id_foreign')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('product_id', 'orders_product_id_foreign')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('color_id', 'orders_color_id_foreign')->references('id')->on('product_colors')->onDelete('set null');
            $table->foreign('size_id', 'orders_size_id_foreign')->references('id')->on('product_sizes')->onDelete('set null');
            $table->foreign('used_offer_id', 'orders_used_offer_id_foreign')->references('id')->on('offers')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropIndex('orders_used_offer_id_foreign');
            $table->dropIndex('orders_size_id_foreign');
            $table->dropIndex('orders_color_id_foreign');
            $table->dropIndex('orders_product_id_foreign');
            $table->dropIndex('orders_user_id_foreign');
        });
    }
};
