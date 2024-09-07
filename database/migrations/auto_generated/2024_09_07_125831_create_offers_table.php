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
        Schema::create('offers', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement()->unsigned();
            $table->string('code')->length(255);
            $table->integer('max_use')->unsigned();
            $table->integer('use_count')->unsigned()->default(0);
            $table->float('offer')->precision(53);
            $table->timestamp('created_at')->precision(0)->nullable();
            $table->timestamp('updated_at')->precision(0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('offers');
    }
};
