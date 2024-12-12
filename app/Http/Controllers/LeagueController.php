<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LeagueController extends Controller
{
    public function showLeagueDetails($leagueId)
    {
        $apiKey = env('API_FOOTBALL_KEY');
        $apiUrl = 'https://v3.football.api-sports.io';

        // Puan durumu
        $standingsResponse = Http::withHeaders([
            'x-rapidapi-key' => $apiKey,
            'x-rapidapi-host' => 'v3.football.api-sports.io',
        ])->get("$apiUrl/standings", [
            'league' => $leagueId,
            'season' => 2022, // Mevcut desteklenen sezon
        ])->json();

        $standings = $standingsResponse['response'][0]['league']['standings'][0] ?? [];

        return view('league.details', [
            'standings' => $standings,
        ]);
    }
}
