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
        Schema::table('club_histories', function (Blueprint $table) {
            $table->foreign('user_id', 'club_histories_user_id_foreign')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('order_id', 'club_histories_order_id_foreign')->references('id')->on('orders')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('club_histories', function (Blueprint $table) {
            $table->dropIndex('club_histories_order_id_foreign');
            $table->dropIndex('club_histories_user_id_foreign');
        });
    }
};
