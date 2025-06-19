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
        Schema::create('class_prices', function (Blueprint $table) {
            $table->id('cp_id');
            $table->unsignedBigInteger('class_id');
            $table->foreign('class_id')->references('class_id')->on('class_names');
            $table->string('standard');
            $table->string('title');
            $table->string('feature',1800);
            $table->bigInteger('price');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_prices');
    }
};
