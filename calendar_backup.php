<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>Calendar</title>
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
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
</body>
</html>
