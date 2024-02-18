<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('game_lottery_number', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('gameId')->constrained()->references('id')->on('games')->onDelete('cascade');
            $table->foreignUuid('lotteryNumberId')->constrained()->references('id')->on('lottery_numbers')->onDelete('cascade');
            $table->integer('position');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('game_lottery_number');
    }
};
