<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canlı Maçlar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
        }

        /* Sol Menü */
        .side-menu {
            background-color: #1c1c1c;
            padding: 10px;
            height: 100vh;
            overflow-y: auto;
        }

        .side-menu a {
            color: #ffffff;
            text-decoration: none;
            margin: 8px 0;
            display: flex;
            align-items: center;
            font-size: 14px;
        }

        .side-menu a img {
            height: 20px;
            width: 20px;
            margin-right: 10px;
        }

        .side-menu a:hover {
            color: #f4a261;
        }

        .side-menu .header {
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 10px;
        }

        /* Maç Kartları */
        .match-card {
            background-color: #1c1c1c;
            margin: 10px 0;
            padding: 15px;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .match-card .team {
            display: flex;
            align-items: center;
            flex-direction: column;
            text-align: center;
            flex: 1;
        }

        .match-card .team img {
            height: 30px;
            width: 30px;
            margin-bottom: 5px;
        }

        .match-card .score {
            color: #f4a261;
            font-weight: bold;
            font-size: 18px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .match-card .minute {
            font-size: 12px;
            color: #888;
            margin-top: 5px;
        }

        /* Üst Menü */
        .top-menu {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #333;
            padding: 10px 15px;
        }

        .top-menu .filters button {
            margin-right: 10px;
            background-color: #444;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
        }

        .top-menu .filters button.active {
            background-color: #f4a261;
            color: black;
        }

        .top-menu .filters button:hover {
            background-color: #555;
        }

        .top-menu .date-picker input {
            background-color: #1c1c1c;
            color: white;
            border: 1px solid #444;
            padding: 5px;
            border-radius: 3px;
        }
    </style>
</head>
<body>
<div class="d-flex">
    <!-- Sol Menü -->
    <div class="side-menu">
        <div class="header">SABİTLENEN LİGLER</div>
        <a href="#">
            <img src="https://upload.wikimedia.org/wikipedia/commons/d/df/Bundesliga_logo_%282017%29.svg" alt="Bundesliga">
            Bundesliga
        </a>
        <a href="#">
            <img src="https://upload.wikimedia.org/wikipedia/en/f/f2/Premier_League_Logo.svg" alt="Premier League">
            Premier League
        </a>
        <a href="#">
            <img src="https://upload.wikimedia.org/wikipedia/en/6/63/LaLiga_Santander_logo.svg" alt="La Liga">
            La Liga
        </a>
        <a href="#">
            <img src="https://upload.wikimedia.org/wikipedia/en/e/e1/Serie_A_logo_%282019%29.svg" alt="Serie A">
            Serie A
        </a>
        <a href="#">
            <img src="https://upload.wikimedia.org/wikipedia/en/b/b5/Super_Lig_logo.svg" alt="Süper Lig">
            Süper Lig
        </a>
    </div>



    <!-- Ana İçerik -->
    <div class="flex-grow-1">
        <!-- Üst Menü -->
        <div class="top-menu">
            <div class="filters">
                <button class="active" onclick="filterMatches('all')">Tümü</button>
                <button onclick="filterMatches('live')">Canlı</button>
                <button onclick="filterMatches('odds')">Oranlar</button>
                <button onclick="filterMatches('finished')">Bitmiş</button>
            </div>
            <div class="date-picker">
                <input type="date" class="form-control" value="{{ date('Y-m-d') }}">
            </div>
        </div>

        <!-- Maçlar -->
        <div class="container mt-3">
            @forelse($groupedMatches as $league => $matches)
                <!-- Lig Başlığı -->
                <div class="league-title">{{ $league }}</div>

                <!-- Lig Maçları -->
                @foreach($matches as $match)
                    <div class="match-card">
                        <div class="team">
                            <img src="{{ $match['teams']['home']['logo'] }}" alt="Home Team">
                            <span>{{ $match['teams']['home']['name'] }}</span>
                        </div>
                        <div class="score">
                            {{ $match['goals']['home'] ?? '-' }} - {{ $match['goals']['away'] ?? '-' }}
                            <div class="minute">
                                {{ $match['fixture']['status']['elapsed'] ?? '0' }}'
                            </div>
                        </div>
                        <div class="team">
                            <img src="{{ $match['teams']['away']['logo'] }}" alt="Away Team">
                            <span>{{ $match['teams']['away']['name'] }}</span>
                        </div>
                    </div>
                @endforeach
            @empty
                <div class="alert alert-info text-center">
                    Şu anda canlı maç bulunmamaktadır.
                </div>
            @endforelse
        </div>

    </div>
</div>

<script>
    function filterMatches(filterType) {
        console.log(`Filtering matches by: ${filterType}`);
        // Add filtering logic here
    }
</script>
</body>
</html>
