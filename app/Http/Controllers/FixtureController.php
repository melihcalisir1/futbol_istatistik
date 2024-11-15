<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FixtureController extends Controller
{
    public function index()
    {
        $apiUrl = 'https://v3.football.api-sports.io/fixtures';
        $headers = [
            'x-rapidapi-key' => env('API_FOOTBALL_KEY'),
            'x-rapidapi-host' => 'v3.football.api-sports.io',
        ];

        // Popüler ligler listesi
        $popularLeagues = [
            'Premier League',
            'La Liga',
            'Bundesliga',
            'Serie A',
            'Ligue 1',
            'UEFA Champions League',
        ];

        // API'den maçları çek
        $response = Http::withHeaders($headers)->get($apiUrl, ['live' => 'all']);
        $fixtures = $response->json()['response'];

        // Liglere göre gruplama
        $groupedFixtures = collect($fixtures)->groupBy(function ($fixture) {
            return $fixture['league']['name'];
        });

        // Popüler ligleri en üstte sıralama
        $sortedFixtures = $groupedFixtures->sortBy(function ($fixtures, $leagueName) use ($popularLeagues) {
            return array_search($leagueName, $popularLeagues) !== false
                ? array_search($leagueName, $popularLeagues)
                : PHP_INT_MAX;
        });

        return view('fixtures.index', [
            'groupedFixtures' => $sortedFixtures
        ]);
    }


}
