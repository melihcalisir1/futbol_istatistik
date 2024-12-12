<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Puan Durumu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
            font-family: 'Arial', sans-serif;
        }
        .section-title {
            font-size: 28px;
            margin: 20px 0;
            font-weight: bold;
            text-align: center;
            text-transform: uppercase;
            color: #f4a261;
        }
        .standings-container {
            background-color: #1e1e1e;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.5);
        }
        .standings-table {
            width: 100%;
            border-collapse: collapse;
        }
        .standings-table th, .standings-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #333;
        }
        .standings-table th {
            background-color: #333;
            color: #f4a261;
            text-transform: uppercase;
        }
        .standings-table td {
            vertical-align: middle;
        }
        .standings-table tr:hover {
            background-color: #292929;
        }
        .team-logo {
            height: 30px;
            width: 30px;
            margin-right: 10px;
            border-radius: 50%;
        }
        .rank-column {
            text-align: center;
            font-weight: bold;
        }
        .points-column {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            color: #f4a261;
        }
        .footer-note {
            margin-top: 20px;
            font-size: 14px;
            text-align: center;
            color: #aaa;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h1 class="section-title">2022 Puan Durumu</h1>

    <div class="standings-container">
        @if (!empty($standings))
            <table class="standings-table table table-dark table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Takım</th>
                    <th>Oynanan</th>
                    <th>Galibiyet</th>
                    <th>Beraberlik</th>
                    <th>Mağlubiyet</th>
                    <th>Gol Atılan</th>
                    <th>Gol Yenilen</th>
                    <th>Averaj</th>
                    <th>Puan</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($standings as $team)
                    <tr>
                        <td class="rank-column">{{ $team['rank'] }}</td>
                        <td>
                            <a href="{{ route('team.details', $team['team']['id']) }}">
                                <img src="{{ $team['team']['logo'] }}" alt="{{ $team['team']['name'] }}" class="team-logo">
                                {{ $team['team']['name'] }}
                            </a>
                        </td>

                        <td>{{ $team['all']['played'] }}</td>
                        <td>{{ $team['all']['win'] }}</td>
                        <td>{{ $team['all']['draw'] }}</td>
                        <td>{{ $team['all']['lose'] }}</td>
                        <td>{{ $team['all']['goals']['for'] }}</td>
                        <td>{{ $team['all']['goals']['against'] }}</td>
                        <td>{{ $team['goalsDiff'] }}</td>
                        <td class="points-column">{{ $team['points'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-info text-center">Puan durumu bulunamadı.</div>
        @endif
    </div>

    <div class="footer-note">
        Puan durumları <a href="https://api-sports.io" target="_blank" style="color: #f4a261;">API Sports</a> tarafından sağlanmaktadır.
    </div>
</div>
</body>
</html>
