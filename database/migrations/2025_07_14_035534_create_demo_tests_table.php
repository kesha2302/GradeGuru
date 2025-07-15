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
        Schema::create('demo_tests', function (Blueprint $table) {
            $table->id('demo_id');
            $table->unsignedBigInteger('class_id');
            $table->foreign('class_id')->references('class_id')->on('class_names');
            $table->string('title');
            $table->integer('time');
            $table->integer('pass_marks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demo_tests');
    }
};
