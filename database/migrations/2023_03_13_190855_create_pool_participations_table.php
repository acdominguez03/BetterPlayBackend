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
        Schema::dropIfExists('pool_participations');
        Schema::create('pool_participations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pool_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->integer('coins');
            $table->json('teams_selected')->nullable();
            $table->integer('numberOfHits')->nullable();
            $table->boolean('sent')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pool_participations');
    }
};
