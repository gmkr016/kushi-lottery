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
        Schema::create('draws', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('gameId')->constrained()->references('id')->on('games');
            $table->unsignedInteger('first');
            $table->unsignedInteger('second');
            $table->unsignedInteger('third');
            $table->unsignedInteger('fourth');
            $table->unsignedInteger('fifth');
            $table->unsignedInteger('sixth');
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
        Schema::dropIfExists('draws');
    }
};
