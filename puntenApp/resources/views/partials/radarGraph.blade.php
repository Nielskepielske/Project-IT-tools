<div class="card">
    <div class="card-header">Radar Graph</div>
    <div class="card-body">
    
    <canvas id="radarChart" width="400" height="400"></canvas>

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

    </div>
</div>