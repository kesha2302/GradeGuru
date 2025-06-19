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
        Schema::create('results', function (Blueprint $table) {
            $table->id('result_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('cp_id');
            $table->foreign('cp_id')->references('cp_id')->on('class_prices');
            $table->unsignedBigInteger('sq_id')->nulllable();
            $table->foreign('sq_id')->references('sq_id')->on('superquestions');
            $table->unsignedBigInteger('rq_id')->nullable();
            $table->foreign('rq_id')->references('rq_id')->on('regularquestions');
            $table->integer('correct');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
