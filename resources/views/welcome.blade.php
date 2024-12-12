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

        .side-menu {
            background-color: #1c1c1c;
            padding: 15px;
            height: 100vh;
            overflow-y: auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .side-menu .header {
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 20px;
            color: #f4a261;
            text-align: center;
            text-transform: uppercase;
        }

        .side-menu a {
            display: flex;
            align-items: center;
            text-decoration: none;
            margin: 10px 0;
            color: #ffffff;
            padding: 10px;
            border-radius: 8px;
            transition: all 0.3s ease;
            background-color: #2a2a2a;
        }

        .side-menu a:hover {
            background-color: #f4a261;
            color: #121212;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        .side-menu a img {
            height: 28px;
            width: 28px;
            margin-right: 12px;
            border-radius: 50%;
            background-color: #ffffff;
            padding: 3px;
        }

        .side-menu a span {
            font-size: 16px;
            font-weight: bold;
            text-transform: capitalize;
        }

        /* Ek Görsel Efekt */
        .side-menu a::after {
            content: '';
            display: block;
            width: 0;
            height: 3px;
            background: linear-gradient(to right, #f4a261, #e76f51);
            transition: width 0.3s ease-in-out;
            margin-top: 5px;
        }

        .side-menu a:hover::after {
            width: 100%;
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
        <a href="{{ route('league.details', ['leagueId' => 78]) }}" class="league-link">
            <img src="https://upload.wikimedia.org/wikipedia/commons/d/df/Bundesliga_logo_%282017%29.svg" alt="Bundesliga">
            <span>Bundesliga</span>
        </a>
        <a href="{{ route('league.details', ['leagueId' => 39]) }}" class="league-link">
            <img src="https://upload.wikimedia.org/wikipedia/en/f/f2/Premier_League_Logo.svg" alt="Premier League">
            <span>Premier League</span>
        </a>
        <a href="{{ route('league.details', ['leagueId' => 140]) }}" class="league-link">
            <img src="https://upload.wikimedia.org/wikipedia/en/6/63/LaLiga_Santander_logo.svg" alt="La Liga">
            <span>La Liga</span>
        </a>
        <a href="{{ route('league.details', ['leagueId' => 135]) }}" class="league-link">
            <img src="https://upload.wikimedia.org/wikipedia/en/e/e1/Serie_A_logo_%282019%29.svg" alt="Serie A">
            <span>Serie A</span>
        </a>
        <a href="{{ route('league.details', ['leagueId' => 203]) }}" class="league-link">
            <img src="https://upload.wikimedia.org/wikipedia/en/b/b5/Super_Lig_logo.svg" alt="Süper Lig">
            <span>Süper Lig</span>
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
                .section-title {
                    font-size: 24px;
                    margin: 20px 0;
                    font-weight: bold;
                    text-align: center;
                }
            </style>
        </head>
        <body>
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
                .section-title {
                    font-size: 24px;
                    margin: 20px 0;
                    font-weight: bold;
                    text-align: center;
                }
                .widget-container {
                    margin-top: 20px;
                    padding: 20px;
                    background-color: #1c1c1c;
                    border-radius: 5px;
                }
            </style>
        </head>
        <body>
        <div class="container mt-5">

            <!-- Canlı Maçlar Widget -->
            <div class="widget-container">
                <div id="wg-api-football-games"
                     data-host="v3.football.api-sports.io"
                     data-key="{{ env('API_FOOTBALL_KEY') }}" <!-- Laravel ENV'den API anahtarı -->
                data-date="{{ date('Y-m-d') }}" <!-- Bugünün tarihi -->
                data-league="" <!-- Belirli bir lig id'si yoksa tüm ligler -->
                data-season="2021" <!-- Mevcut sezon -->
                data-theme=""
                data-refresh="15"
                data-show-toolbar="true"
                data-show-errors="false"
                data-show-logos="true"
                data-modal-game="true"
                data-modal-standings="true"
                data-modal-show-logos="true">
            </div>
            <script
                type="module"
                src="https://widgets.api-sports.io/2.0.3/widgets.js">
            </script>
        </div>
    </div>
</body>
</html>

</body>
        </html>

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
