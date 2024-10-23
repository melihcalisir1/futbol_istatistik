<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2021 Süper Lig Maçları</title>
</head>
<body>
<h1>2021 Süper Lig Maçları</h1>
@if($scores->isEmpty())
    <p>Henüz 2021 yılına ait maç bulunamadı.</p>
@else
    @foreach($scores as $score)
        <p>{{ $score->team_home }} {{ $score->score_home }} - {{ $score->score_away }} {{ $score->team_away }} ({{ $score->match_time }})</p>
    @endforeach
@endif
</body>
</html>
