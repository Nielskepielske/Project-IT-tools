<style>
    #radarChart {
        display: black;
        margin-left: auto;
        margin-right: auto;
    }
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Radar Chart') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <canvas id="radarChart" style="width: 700px; height: 700px;"></canvas> <!-- Hier kun je de breedte en hoogte van de canvas aanpassen -->
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('radarChart').getContext('2d');
        var radarChart = new Chart(ctx, {
            type: 'radar',
            data: {
                labels: {!! json_encode($data['labels']) !!},
                datasets: [{
                    label: 'punten: ',
                    data: {!! json_encode($data['data']) !!},
                }]
            },
            options: {
                onClick: function (evt) {
                    var activePoints = radarChart.getElementsAtEventForMode(evt, 'point', radarChart.options);
                    var firstPoint = activePoints[0];
                    var label = radarChart.data.labels[firstPoint.index];
                    var value = radarChart.data.datasets[firstPoint.datasetIndex].data[firstPoint.index];
                    console.log(label + ": " + value);
                    location.replace("{{ route('test.show') }}?naam="+label);
                },
                maintainAspectRatio: false,
                aspectRatio: 1,
                responsive: false, // Hier stel je responsive op false in, zodat de grootte niet wordt aangepast aan de container
                scales: {
                    r: {
                        angleLines: {
                            display: true
                        },
                        suggestedMin: 0,
                        suggestedMax: 100,
                        stepSize: 10,
                        pointLabels: {
                            font: {
                                size: 16 // Vergroot de lettergrootte voor betere zichtbaarheid
                            }
                        },
                        grid: {
                            lineWidth: 2, // Vergroot de lijndikte voor betere zichtbaarheid
                            circular: true // Maak de radarlijnen cirkelvormig
                        }
                    }
                    }
                
                }
            });
        console.log(radarChart);
    </script>
</x-app-layout>
