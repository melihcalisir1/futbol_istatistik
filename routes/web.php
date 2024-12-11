<?php

use App\Http\Controllers\FixtureController;
use App\Http\Controllers\LeagueController;
use App\Http\Controllers\LiveScoreController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\ScoreController;
use Illuminate\Support\Facades\Route;


// Ana Sayfa Canlı Maçlar
Route::get('/', [LiveScoreController::class, 'showScores']);
Route::get('/fetch-scores', [LiveScoreController::class, 'fetchScores']);
Route::get('/superlig-2023', [ScoreController::class, 'showSuperLig2023Scores']);
Route::get('/fetch-superlig-2023', [ScoreController::class, 'fetchSuperLig2023Scores']);


// Ana sayfadan sezon ve lig seçimi yaparak round'ları listeleyen route
Route::get('/rounds', [MatchController::class, 'selectSeasonAndLeague'])->name('rounds.select');

// Sezon ve lig seçimine göre round'ları listeleyen route
Route::get('/season/{season}/league/{league}/rounds', [MatchController::class, 'getRounds'])->name('rounds');

// Belirli bir round'un maçlarını listeleyen route
Route::get('/season/{season}/league/{league}/round/{round}/matches', [MatchController::class, 'showRoundMatches'])->name('round.matches');

Route::get("/fixtures",[FixtureController::class,"index"])->name("fixtures.index");




Route::get('/live-matches', [LiveScoreController::class, 'liveMatches']);

Route::get('/league/{leagueId}', [LeagueController::class, 'showLeagueDetails'])->name('league.details');


