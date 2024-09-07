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
        Schema::create('users', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement()->unsigned();
            $table->string('first_name')->length(255);
            $table->string('last_name')->length(255);
            $table->string('phone')->length(255);
            $table->string('referral_code')->length(255);
            $table->bigInteger('invited_by_id')->unsigned()->nullable();
            $table->integer('club_score')->unsigned()->default(0);
            $table->string('password')->length(255);
            $table->string('remember_token')->length(100)->nullable();
            $table->timestamp('created_at')->precision(0)->nullable();
            $table->timestamp('updated_at')->precision(0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('users');
    }
};
