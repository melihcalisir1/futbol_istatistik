<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bugün Oynanacak Maçlar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
        }

        .league-header {
            background-color: #007bff;
            color: white;
            padding: 10px;
            margin-top: 20px;
            border-radius: 5px;
            font-size: 18px;
            font-weight: bold;
        }

        .match-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #fff;
            margin: 5px 0;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .match-item .team {
            display: flex;
            align-items: center;
            flex: 1;
        }

        .match-item .team img {
            height: 30px;
            width: 30px;
            margin-right: 10px;
        }

        .match-item .team-right {
            justify-content: flex-end;
            text-align: right;
            flex: 1;
        }

        .match-item .team-right img {
            margin-left: 10px;
            margin-right: 0;
        }

        .match-item .match-time {
            font-weight: bold;
            font-size: 16px;
            color: #333;
            flex: 0 0 80px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Bugün Oynanacak Maçlar</h1>

    @forelse ($groupedFixtures as $league => $matches)
        <div class="league-header">
            {{ $league }}
        </div>
        @foreach ($matches as $fixture)
            <div class="match-item">
                <div class="team">
                    <img src="{{ $fixture['teams']['home']['logo'] }}" alt="Home Team Logo">
                    <span>{{ $fixture['teams']['home']['name'] }}</span>
                </div>
                <div class="match-time">
                    {{ \Carbon\Carbon::parse($fixture['fixture']['date'])->addHours(3)->format('H:i') }}
                </div>
                <div class="team team-right">
                    <span>{{ $fixture['teams']['away']['name'] }}</span>
                    <img src="{{ $fixture['teams']['away']['logo'] }}" alt="Away Team Logo">
                </div>
            </div>
        @endforeach
    @empty
        <div class="text-center">
            <p>Bugün için maç bulunamadı.</p>
        </div>
    @endforelse
</div>
</body>
</html>
