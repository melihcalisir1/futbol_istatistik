<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lig Detayları</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
        }
        .section-title {
            font-size: 24px;
            margin-bottom: 20px;
            font-weight: bold;
        }
        .match-card {
            background-color: #1c1c1c;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            cursor: pointer;
        }
        .match-card:hover {
            background-color: #2a2a2a;
        }
        .match-card img {
            height: 20px;
            width: 20px;
            margin-right: 10px;
        }
        .standings-table table {
            width: 100%;
            color: white;
            background-color: #1c1c1c;
            border-collapse: collapse;
        }
        .standings-table th, .standings-table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #333;
        }
        .standings-table th {
            background-color: #333;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Lig Detayları</h1>

    <!-- Puan Durumu -->
    <div>
        <h2 class="section-title">Puan Durumu</h2>
        <div id="wg-api-football-standings"
             data-host="v3.football.api-sports.io"
             data-key="{{ env('API_FOOTBALL_KEY') }}"
             data-league="{{ $leagueId }}"
             data-season="2021"
             data-theme=""
             data-show-errors="false"
             data-show-logos="true"
             class="wg_loader">
        </div>
        <script
            type="module"
            src="https://widgets.api-sports.io/2.0.3/widgets.js">
        </script>
    </div>


    <script
        type="module"
        src="https://widgets.api-sports.io/2.0.3/widgets.js">
    </script>
</div>
</div>
</body>
</html>
