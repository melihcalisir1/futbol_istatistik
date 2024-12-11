<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LeagueController extends Controller
{
    public function showLeagueDetails($leagueId)
    {
        $apiKey = env('API_FOOTBALL_KEY');
        $apiHost = 'v3.football.api-sports.io';
        $apiUrl = 'https://v3.football.api-sports.io';

        // Kullanılabilir sezon
        $season = 2022; // Free plan için maksimum desteklenen sezon

        // Puan durumu
        $standingsResponse = Http::withHeaders([
            'x-rapidapi-key' => $apiKey,
            'x-rapidapi-host' => $apiHost,
        ])->get("$apiUrl/standings", [
            'league' => $leagueId,
            'season' => $season, // Free plan için desteklenen sezon
        ]);

        $standings = $standingsResponse->json();

        return view('league.details', [
            'standings' => $standings['response'][0]['league']['standings'][0] ?? [], // Puan durumu listesi
        ]);
    }
}
