<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- hier chart.js? -->
</head>
<body>
    <header>
        <!-- Hier nav-partial -->
    </header>

    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    @include('partials.radarGraph',['data'=>$data])
                </div>
                <div class="col-md-6">
                    @include('partials.details')
                </div>
            </div>
        </div>
    </main>

    <footer>
        <!-- Hier ook iets random zetten? -->
    </footer>

    <!--  -->
</body>
</html>
