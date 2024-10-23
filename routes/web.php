<?php

use App\Http\Controllers\LiveScoreController;
use App\Http\Controllers\ScoreController;
use Illuminate\Support\Facades\Route;


Route::get('/', [LiveScoreController::class, 'showScores']);
Route::get('/fetch-scores', [LiveScoreController::class, 'fetchScores']);
Route::get('/superlig-2023', [ScoreController::class, 'showSuperLig2023Scores']);
Route::get('/fetch-superlig-2023', [ScoreController::class, 'fetchSuperLig2023Scores']);

