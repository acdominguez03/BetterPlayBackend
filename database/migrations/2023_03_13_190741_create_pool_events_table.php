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
        Schema::dropIfExists('pool_events');
        Schema::create('pool_events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('home_id');
            $table->foreign('home_id')->references('id')->on('teams');
            $table->unsignedBigInteger('away_id');
            $table->foreign('away_id')->references('id')->on('teams');
            $table->enum('result', ['1','X','2'])->nullable();
            $table->bigInteger('date');
            $table->foreignId('pool_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pool_events');
    }
};
