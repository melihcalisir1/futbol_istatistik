<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2021 Süper Lig Maçları</title>
    <style>
        /* Genel Stil Ayarları */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            color: #333;
            margin-top: 20px;
        }

        /* Maç Kartları */
        .score-card {
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 15px;
            margin: 10px;
            width: 90%;
            max-width: 500px;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .score-card p {
            margin: 5px 0;
            font-size: 18px;
            color: #555;
        }

        /* Takım ve Skor Bilgileri */
        .teams {
            display: flex;
            justify-content: space-between;
            width: 100%;
            align-items: center;
            text-align: center;
        }

        .team, .score {
            flex: 1;
            font-weight: bold;
            color: #333;
        }

        .score {
            font-size: 24px;
            color: #ff5722;
        }

        /* Tarih Bilgisi */
        .match-time {
            font-size: 14px;
            color: #888;
        }
    </style>
</head>
<body>
<h1>2021 Süper Lig Maçları</h1>
@if($scores->isEmpty())
    <p>Henüz 2021 yılına ait maç bulunamadı.</p>
@else
    @foreach($scores as $score)
        <div class="score-card">
            <div class="teams">
                <span class="team">{{ $score->team_home }}</span>
                <span class="score">{{ $score->score_home }} - {{ $score->score_away }}</span>
                <span class="team">{{ $score->team_away }}</span>
            </div>
            <p class="match-time">{{ date('d-m-Y H:i', strtotime($score->match_time)) }}</p>
        </div>
    @endforeach
@endif
</body>
</html>
