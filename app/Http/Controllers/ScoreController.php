<?php

namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ScoreController extends Controller
{



    public function fetchSuperLig2023Scores()
    {
        $response = Http::withHeaders([
            'x-rapidapi-key' => env('API_FOOTBALL_KEY'),
            'x-rapidapi-host' => 'v3.football.api-sports.io',
        ])->get(env('API_FOOTBALL_URL') . '/fixtures', [
            'league' => 203,
            'season' => 2021,
        ]);

        if ($response->successful()) {
            $scoresData = $response->json();


            foreach ($scoresData['response'] as $match) {
                Score::updateOrCreate(
                    ['match_id' => $match['fixture']['id']],
                    [
                        'team_home' => $match['teams']['home']['name'],
                        'team_away' => $match['teams']['away']['name'],
                        'score_home' => $match['goals']['home'] ?? 0,
                        'score_away' => $match['goals']['away'] ?? 0,
                        'match_time' => $match['fixture']['date'],
                        'league_id' => 203,
                    ]
                );
            }
        } else {
            Log::error('API hatası', [
                'status' => $response->status(),
                'response' => $response->body()
            ]);
            return response()->json(['error' => 'API\'den Süper Lig 2023 maçları alınamadı.'], 500);
        }

        return redirect('/superlig-2023');
    }



    public function showSuperLig2023Scores()
    {
        $scores = Score::where('league_id', 203)
        ->whereYear('match_time', 2021)
        ->get();

        return view('superlig2023', compact('scores'));
    }


}
