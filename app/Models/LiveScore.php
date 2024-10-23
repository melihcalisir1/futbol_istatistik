<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveScore extends Model
{
    use HasFactory;

    protected $fillable = [
        'match_id','team_home', 'team_away', 'score_home', 'score_away', 'match_time'
    ];
}
