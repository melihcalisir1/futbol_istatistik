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
        Schema::create('live_scores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('match_id')->unique();  // unsignedBigInteger for IDs
            $table->string('team_home');
            $table->string('team_away');
            $table->unsignedInteger('score_home')->nullable(); // unsigned for scores
            $table->unsignedInteger('score_away')->nullable();
            $table->timestamp('match_time');
            $table->timestamps();

            $table->index('team_home');
            $table->index('team_away');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('live_scores');
    }
};
