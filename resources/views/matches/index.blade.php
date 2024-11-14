<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sezon ve Lig Seçimi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container my-5">
    <h1 class="text-center mb-4">Sezon ve Lig Seçimi</h1>
    <form method="GET" id="selectionForm">
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="season" class="form-label">Sezon</label>
                <select class="form-select" id="season" name="season" required>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="league" class="form-label">Lig</label>
                <select class="form-select" id="league" name="league" required>
                    <option value="203">Süper Lig</option>
                    <option value="39">Premier Lig</option>
                    <option value="140">La Liga</option>
                </select>
            </div>
        </div>
        <div class="text-center">
            <button type="button" class="btn btn-primary" onclick="submitForm()">Turları Getir</button>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function submitForm() {
        const season = document.getElementById('season').value;
        const league = document.getElementById('league').value;

        // Dinamik olarak URL'yi ayarlıyoruz
        const actionUrl = `/season/${season}/league/${league}/rounds`;
        document.getElementById('selectionForm').action = actionUrl;

        // Formu gönderiyoruz
        document.getElementById('selectionForm').submit();
    }
</script>
</body>
</html>
