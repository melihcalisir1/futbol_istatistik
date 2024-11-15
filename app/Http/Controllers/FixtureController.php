<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FixtureController extends Controller
{
    public function index()
    {
        $response = Http::withHeaders([
            'x-rapidapi-key' => env('API_FOOTBALL_KEY'),
            'x-rapidapi-host' => 'v3.football.api-sports.io',
        ])->get("https://v3.football.api-sports.io/fixtures",[
            "date" => now()->format("Y-m-d")
        ]);

        if($response->successful()) {
            $fixtures = $response->json()["response"];
        } else {
            $fixtures = [];
        }
        return view("fixtures.index",compact("fixtures"));
    }
}
