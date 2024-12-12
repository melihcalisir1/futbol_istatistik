<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PlayerController extends Controller
{
    public function showTeamPlayers($teamId)
    {
        $apiKey = env('API_FOOTBALL_KEY');
        $apiHost = 'v3.football.api-sports.io';
        $apiUrl = 'https://v3.football.api-sports.io';

        // Oyuncu bilgilerini getir
        $players = Http::withHeaders([
            'x-rapidapi-key' => $apiKey,
            'x-rapidapi-host' => $apiHost,
        ])->get("$apiUrl/players", [
            'team' => $teamId,
            'season' => 2021, // Örneğin 2021 sezonu
        ])->json();

        return view('team.details', [
            'players' => $players['response'] ?? [],
        ]);
    }
}
