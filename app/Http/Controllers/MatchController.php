<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MatchController extends Controller
{
    public function getRounds($season, $league)
    {
        $apiUrl = 'https://v3.football.api-sports.io/fixtures/rounds';
        $apiKey = env('API_FOOTBALL_KEY');

        $response = Http::withHeaders([
            'x-apisports-key' => $apiKey,
        ])->get($apiUrl, [
            'season' => $season,
            'league' => $league,
        ]);

        $rounds = $response->json()['response'];

        // Turları view'e gönderiyoruz
        return view('matches.rounds', compact('rounds', 'season', 'league'));
    }

    public function showRoundMatches($season, $league, $round)
    {
        $apiUrl = 'https://v3.football.api-sports.io/fixtures';
        $apiKey = env('API_FOOTBALL_KEY');

        $response = Http::withHeaders([
            'x-apisports-key' => $apiKey,
        ])->get($apiUrl, [
            'season' => $season,
            'league' => $league,
            'round' => $round,
        ]);

        $matches = $response->json()['response'];

        // $season ve $league değişkenlerini view'e gönderiyoruz
        return view('matches.round_matches', compact('matches', 'round', 'season', 'league'));
    }


}
