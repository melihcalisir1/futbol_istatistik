<?php

use App\Http\Controllers\LiveScoreController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\ScoreController;
use Illuminate\Support\Facades\Route;


Route::get('/', [LiveScoreController::class, 'showScores']);
Route::get('/fetch-scores', [LiveScoreController::class, 'fetchScores']);
Route::get('/superlig-2023', [ScoreController::class, 'showSuperLig2023Scores']);
Route::get('/fetch-superlig-2023', [ScoreController::class, 'fetchSuperLig2023Scores']);

// Round'ları listeleyen route
Route::get('/season/{season}/league/{league}/rounds', [MatchController::class, 'getRounds'])->name('rounds');

// Belirli bir round'un maçlarını listeleyen route
Route::get('/season/{season}/league/{league}/round/{round}/matches', [MatchController::class, 'showRoundMatches'])->name('round.matches');

