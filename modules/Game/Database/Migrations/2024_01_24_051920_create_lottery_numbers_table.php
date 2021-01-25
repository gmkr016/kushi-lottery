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
        Schema::create('lottery_numbers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('ticketId')->constrained()->references('id')->on('tickets');
            $table->string('type')->comment('number chosen by auto or manual');
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
        Schema::dropIfExists('games');
    }
};
