<!-- resources/views/matches/round_matches.blade.php -->
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $round }} Maçları</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container my-5">
    <h1 class="text-center mb-4">{{ $round }} Maçları</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
            <tr>
                <th scope="col">Ev Sahibi Takım</th>
                <th scope="col">Skor</th>
                <th scope="col">Deplasman Takımı</th>
                <th scope="col">Tarih</th>
            </tr>
            </thead>
            <tbody>
            @foreach($matches as $match)
                <tr>
                    <td>{{ $match['teams']['home']['name'] }}</td>
                    <td class="text-center">
                        {{ $match['goals']['home'] ?? '-' }} - {{ $match['goals']['away'] ?? '-' }}
                    </td>
                    <td>{{ $match['teams']['away']['name'] }}</td>
                    <td>{{ \Carbon\Carbon::parse($match['fixture']['date'])->format('d M Y, H:i') }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="text-center mt-4">
        <a href="{{ route('rounds.select') }}" class="btn btn-secondary">Geri Dön</a>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
