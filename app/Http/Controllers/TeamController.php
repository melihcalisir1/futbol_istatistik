<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TeamController extends Controller
{
    public function showTeamDetails($teamId)
    {
        $apiKey = env('API_FOOTBALL_KEY');
        $apiHost = 'v3.football.api-sports.io';
        $apiUrl = 'https://v3.football.api-sports.io';

        // Takım Detayları
        $teamDetails = Http::withHeaders([
            'x-rapidapi-key' => $apiKey,
            'x-rapidapi-host' => $apiHost,
        ])->get("$apiUrl/teams", [
            'id' => $teamId,
        ])->json();

        // Takım İstatistikleri
        $teamStatistics = Http::withHeaders([
            'x-rapidapi-key' => $apiKey,
            'x-rapidapi-host' => $apiHost,
        ])->get("$apiUrl/teams/statistics", [
            'season' => 2021, // Mevcut veya geçerli sezon
            'team' => $teamId,
            'league' => 39, // Premier League örnek olarak
        ])->json();

        return view('team.details', [
            'teamDetails' => $teamDetails['response'][0] ?? null,
            'teamStatistics' => $teamStatistics['response'] ?? null,
        ]);
    }


}
