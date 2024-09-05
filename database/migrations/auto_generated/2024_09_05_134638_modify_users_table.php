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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('email');
            $table->dropColumn('email_verified_at');
            $table->string('first_name')->length(255);
            $table->string('last_name')->length(255);
            $table->string('phone')->length(255);
            $table->string('referral_code')->length(255);
            $table->bigInteger('invited_by_id')->unsigned()->nullable();
            $table->integer('club_score')->unsigned()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('club_score');
            $table->dropColumn('invited_by_id');
            $table->dropColumn('referral_code');
            $table->dropColumn('phone');
            $table->dropColumn('last_name');
            $table->dropColumn('first_name');
            $table->timestamp('email_verified_at')->precision(0)->nullable();
            $table->string('email')->length(255)->unique();
            $table->string('name')->length(255);
        });
    }
};
