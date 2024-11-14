<!DOCTYPE html>
<html>
<head>
    <title>Regular Season 1 Matches</title>
</head>
<body>
<h1>Regular Season - 1 Maçları</h1>
<ul>
    @foreach($matches as $match)
        <li>
            {{ $match['teams']['home']['name'] }} vs {{ $match['teams']['away']['name'] }} <br>
            Tarih: {{ \Carbon\Carbon::parse($match['fixture']['date'])->format('d M Y, H:i') }}
        </li>
        <hr>
    @endforeach
</ul>
</body>
</html>
