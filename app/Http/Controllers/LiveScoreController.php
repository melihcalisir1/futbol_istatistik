<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class LiveScoreController extends Controller
{
    public function fetchScores()
    {
        $url = env('API_FOOTBALL_URL') . '/fixtures?live=all';

        $response = Http::withHeaders([
            'x-rapidapi-key' => env('API_FOOTBALL_KEY'),
            'x-rapidapi-host' => 'v3.football.api-sports.io',
        ])->get($url);

        if ($response->successful()) {
            $scoresData = $response->json();

            if (!isset($scoresData['response']) || count($scoresData['response']) === 0) {
                return []; // Eğer veri yoksa boş array döndür
            }

            return $scoresData['response'];
        } else {
            Log::error('API hatası', [
                'status' => $response->status(),
                'response' => $response->body()
            ]);

            return [];
        }
    }

    public function liveMatches()
    {
        $liveMatches = $this->fetchScores();

        if (!empty($liveMatches)) {
            // Liglere göre gruplama
            $groupedMatches = collect($liveMatches)->groupBy('league.name');

            return view('welcome', ['groupedMatches' => $groupedMatches]);
        }

        return view('welcome', ['groupedMatches' => collect()]);
    }


}
