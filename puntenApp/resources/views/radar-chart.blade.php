<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Radar Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <canvas id="radarChart"></canvas>

    <script>
        var ctx = document.getElementById('radarChart').getContext('2d');
        var radarChart = new Chart(ctx, {
            type: 'radar',
            data: {
                labels: {!! json_encode($data['labels']) !!},
                datasets: [{
                    label: 'Radar Chart',
                    data: {!! json_encode($data['data']) !!}
                }]
            },
            options: {
                maintainAspectRatio: false,
                aspectRatio: 1, // Dit zorgt ervoor dat de grafiek een vierkant is
                responsive: true,
                scales: {
                    r: {
                        // Pas andere opties aan 
                    }
                }
            }
        });
    </script>
</body>
</html>

