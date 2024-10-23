<?php

namespace App\Http\Controllers;

use App\Models\LiveScore;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class LiveScoreController extends Controller
{
    public function fetchScores()
    {
        // API URL'sini kontrol edin
        $url = env('API_FOOTBALL_URL') . '/fixtures?live=all';

        // Hedef URL'yi loglayın
        Log::info('API URL:', ['url' => $url]);

        $response = Http::withHeaders([
            'x-rapidapi-key' => env('API_FOOTBALL_KEY'),
            'x-rapidapi-host' => 'v3.football.api-sports.io',
        ])->get($url);

        Log::info('API Yanıtı:', $response->json());

        if ($response->successful()) {
            $scoresData = $response->json();

            if (!isset($scoresData['results']) || $scoresData['results'] == 0) {
                return redirect('/')->with('error', 'Şu an canlı maç yok.');
            }

            // Eski maçları sil
            Score::where('match_time', '<=', now())->delete();

            foreach ($scoresData['response'] as $match) {
                LiveScore::updateOrCreate(
                    ['match_id' => $match['fixture']['id']],
                    [
                        'team_home' => $match['teams']['home']['name'],
                        'team_away' => $match['teams']['away']['name'],
                        'score_home' => $match['goals']['home'] ?? 0,
                        'score_away' => $match['goals']['away'] ?? 0,
                        'match_time' => $match['fixture']['date'],
                    ]
                );
            }
        } else {
            Log::error('API hatası', [
                'status' => $response->status(),
                'response' => $response->body()
            ]);
            return redirect('/')->with('error', 'API\'den skorlar alınamadı.');
        }

        return redirect('/');
    }

    public function showScores()
    {
        $scores = LiveScore::all();
        return view('scores', compact('scores'));
    }
}
