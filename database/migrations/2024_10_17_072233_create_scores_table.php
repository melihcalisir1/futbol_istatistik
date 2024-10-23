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
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('match_id')->unique();  // unsignedBigInteger for IDs
            $table->string('team_home');
            $table->string('team_away');
            $table->unsignedInteger('score_home')->nullable(); // unsigned for scores
            $table->unsignedInteger('score_away')->nullable();
            $table->timestamp('match_time');
            $table->unsignedInteger('league_id')->nullable();
            $table->timestamps();

            // Optional: Add indexes
            $table->index('team_home');
            $table->index('team_away');

            // Optional: If match_id is related to another table
            // $table->foreign('match_id')->references('id')->on('matches')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scores');
    }
};
