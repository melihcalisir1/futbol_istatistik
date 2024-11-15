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
        }

        .match-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 10px;
            background-color: #f9f9f9;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .match-card h5 {
            margin: 0 0 10px;
        }

        .match-card .teams {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .match-card .teams img {
            height: 30px;
            width: 30px;
            border-radius: 50%;
        }

        .match-card .time {
            text-align: center;
            font-weight: bold;
            color: #555;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4 text-center">Bugün Oynanacak Maçlar</h1>

    @forelse ($fixtures as $fixture)
        <div class="match-card">
            <h5>{{ $fixture['league']['name'] }}</h5>
            <div class="teams">
                <div class="team">
                    <img src="{{ $fixture['teams']['home']['logo'] }}" alt="Home Team">
                    <span>{{ $fixture['teams']['home']['name'] }}</span>
                </div>
                <div class="team">
                    <img src="{{ $fixture['teams']['away']['logo'] }}" alt="Away Team">
                    <span>{{ $fixture['teams']['away']['name'] }}</span>
                </div>
            </div>
            <div class="time">{{ \Carbon\Carbon::parse($fixture['fixture']['date'])->format('H:i') }}</div>
        </div>
    @empty
        <p class="text-center">Bugün için maç bulunamadı.</p>
    @endforelse
</div>
</body>
</html>
