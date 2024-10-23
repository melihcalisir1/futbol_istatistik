<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Football Scores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Live Football Scores</h1>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if($scores->isEmpty())
        <p>Henüz canlı maç bulunamadı.</p>
    @else
        @foreach($scores as $score)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $score->team_home }} vs {{ $score->team_away }}</h5>
                    <p class="card-text">Score: {{ $score->score_home }} - {{ $score->score_away }}</p>
                    <p class="card-text"><small class="text-muted">Match Time: {{ $score->match_time }}</small></p>
                </div>
            </div>
        @endforeach
    @endif

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    setInterval(function() {
        $.ajax({
            url: '/fetch-scores',
            type: 'GET',
            success: function(data) {
                if (data.html) {
                    $('#scores-container').html(data.html);
                } else if (data.error) {
                    console.error(data.error);
                } else {
                    console.error('Unexpected response format.');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching scores:', error);
            }
        });
    }, 60000); // 60 saniye
</script>
</body>
</html>
