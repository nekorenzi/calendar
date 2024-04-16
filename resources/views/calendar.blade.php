<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            
        </style>
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" />
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                    </header>
                    <main class="mt-6">
                        <div class="calendar">
    <div class="controls">
        <button onclick="showToday()">Today</button>
        <button onclick="showPrevious()">＜</button>
    </div>
    
    @php
        $today = \Carbon\Carbon::now();
        $start_date = $today->subDays(5);
        $end_date = $start_date->copy()->addDays(30);
    @endphp
    
    @while ($start_date->lte($end_date))
        <div class="day">
            {{ $start_date->format('n/j') }}
            <br>
            {{ $start_date->isoFormat('ddd') }}
        </div>
        @php
            $start_date->addDay();
        @endphp
    @endwhile
</div>

<script>
    function showToday() {
        window.location.reload();
    }
    
    function showPrevious() {
        var urlParams = new URLSearchParams(window.location.search);
        var days = parseInt(urlParams.get('days')) || 5;
        window.location.href = window.location.pathname + '?days=' + (days - 1);
    }
</script>

                    </main>
                    <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                    </footer>
                </div>
            </div>
        </div>
    </body>
</html>
