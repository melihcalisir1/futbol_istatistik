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
        @if(!empty($standings))
            <div class="standings-table">
                <table>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Takım</th>
                        <th>Oynanan</th>
                        <th>Galibiyet</th>
                        <th>Beraberlik</th>
                        <th>Mağlubiyet</th>
                        <th>Attığı</th>
                        <th>Yediği</th>
                        <th>Puan</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($standings as $team)
                        <tr>
                            <td>{{ $team['rank'] }}</td>
                            <td>{{ $team['team']['name'] }}</td>
                            <td>{{ $team['all']['played'] }}</td>
                            <td>{{ $team['all']['win'] }}</td>
                            <td>{{ $team['all']['draw'] }}</td>
                            <td>{{ $team['all']['lose'] }}</td>
                            <td>{{ $team['all']['goals']['for'] }}</td>
                            <td>{{ $team['all']['goals']['against'] }}</td>
                            <td>{{ $team['points'] }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-info">Puan durumu bulunamadı.</div>
        @endif
    </div>
</div>
</body>
</html>
