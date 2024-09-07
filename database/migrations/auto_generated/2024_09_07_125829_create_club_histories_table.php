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
        Schema::create('club_histories', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement()->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->enum('cause', ['Order', 'Use']);
            $table->bigInteger('amount');
            $table->bigInteger('order_id')->unsigned()->nullable();
            $table->timestamp('created_at')->precision(0)->nullable();
            $table->timestamp('updated_at')->precision(0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('club_histories');
    }
};
