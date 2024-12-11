<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LeagueController extends Controller
{
    public function showLeagueDetails($leagueId)
    {
        // Lig Detaylarını Widget ile göstermek için League ID gönderiliyor
        return view('league.details', [
            'leagueId' => $leagueId, // Dinamik olarak widget'a iletilecek
        ]);
    }
}
