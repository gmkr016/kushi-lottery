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
        Schema::create('games', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('user_id')->constrained();
            $table->string('title');
            $table->unsignedInteger('prizeMoney');
            $table->timestamp('startDate', 2)->nullable();
            $table->timestamp('endDate', 2)->nullable();
            $table->timestamp('drawDate', 2)->nullable();
            $table->timestamp('createdAt', 2)->nullable();
            $table->timestamp('updatedAt', 2)->nullable();
            $table->softDeletes('deletedAt')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
