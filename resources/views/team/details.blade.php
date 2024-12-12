<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Details</title>
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
        .team-logo {
            width: 100px;
            margin-bottom: 20px;
        }
        .stats-table {
            width: 100%;
            color: white;
            background-color: #1c1c1c;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .stats-table th, .stats-table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #333;
        }
        .stats-table th {
            background-color: #333;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    @if($teamDetails)
        <div class="text-center">
            <img src="{{ $teamDetails['team']['logo'] }}" alt="{{ $teamDetails['team']['name'] }}" class="team-logo">
            <h1>{{ $teamDetails['team']['name'] }}</h1>
            <p><strong>Founded:</strong> {{ $teamDetails['team']['founded'] }}</p>
            <p><strong>Country:</strong> {{ $teamDetails['team']['country'] }}</p>
            <p><strong>Stadium:</strong> {{ $teamDetails['venue']['name'] }} - {{ $teamDetails['venue']['city'] }}</p>
        </div>
    @else
        <div class="alert alert-danger">Takım bilgileri bulunamadı.</div>
    @endif

    @if($teamStatistics)
        <div>
            <h2 class="section-title">Takım İstatistikleri</h2>
            <table class="stats-table">
                <thead>
                <tr>
                    <th>İstatistik</th>
                    <th>Değer</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Toplam Maç</td>
                    <td>{{ $teamStatistics['fixtures']['played']['total'] }}</td>
                </tr>
                <tr>
                    <td>Galibiyet</td>
                    <td>{{ $teamStatistics['fixtures']['wins']['total'] }}</td>
                </tr>
                <tr>
                    <td>Beraberlik</td>
                    <td>{{ $teamStatistics['fixtures']['draws']['total'] }}</td>
                </tr>
                <tr>
                    <td>Mağlubiyet</td>
                    <td>{{ $teamStatistics['fixtures']['loses']['total'] }}</td>
                </tr>
                <tr>
                    <td>Atılan Goller</td>
                    <td>{{ $teamStatistics['goals']['for']['total']['total'] }}</td>
                </tr>
                <tr>
                    <td>Yenilen Goller</td>
                    <td>{{ $teamStatistics['goals']['against']['total']['total'] }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info">Takım istatistikleri bulunamadı.</div>
    @endif
</div>
</body>
</html>
