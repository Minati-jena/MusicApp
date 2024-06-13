<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Song List</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('https://media.istockphoto.com/id/1422040059/photo/music-background-design-musical-writing-notes.webp?b=1&s=170667a&w=0&k=20&c=qHeXLQCBEGmQWJqItd3YrPFxqAEEvJuJF5pZMZU6KHA=') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            color: white;
        }
        .container {
            margin-top: 20px;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }
        h2 {
            color: white;
            font-weight: bold;
            margin-bottom: 10px;
            text-align: center;
        }
        table {
            width: 100%;
        }
        thead {
            background-color: #999; 
            color: white;
        }
        thead th:nth-child(1) {
            width: 50px; 
        }
        .audio-control {
            width: 100%;
            margin: 5px 0;
        }
        .audio-container {
            background-color: rgba(25, 255, 255, 0.1);
            padding: 10px;
            border-radius: 3px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .btn-back {
            margin-top: 10px;
            background-color: #999; 
            border-color: #20c997;
            color: white;
            border-radius: 10px;
            transition: background-color 0.3s ease;
        }
        .btn-back:hover {
            background-color: #198754; 
            border-color: #198754;
        }
        .audio-visual {
            display: none;
            margin-left: 10px;
            width: 100px;
            height: 20px;
            display: flex;
            justify-content: space-around;
        }
        .bar {
            width: 5px;
            height: 100%;
            background: linear-gradient(to top, #20c997, #198754); /* Gradient for visualizer bars */
            margin: 0 2px;
            animation: bounce 1s infinite alternate;
        }
        @keyframes bounce {
            to {
                transform: scaleY(1.5);
            }
        }
        audio.playing + .audio-visual {
            display: flex;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Song List</h2>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Sl. No</th>
                <th>Song</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 0; if (@$_GET['page'] == '') { $i = 0; } else { $i = (@$_GET['page'] - 1) * 5; } ?>
            @foreach($lists as $list)
            <tr>
                <td>{{++$i}}</td>
                <td>
                    <div class="audio-container">
                        <audio controls class="audio-control" onplay="showVisual(this)" onpause="hideVisual(this)" onended="hideVisual(this)">
                            <source src="{{ url('/') }}/audios/{{ $list->audio }}" type="audio/mpeg" alt="{{ $list->audio }}">
                            Your browser does not support the audio element.
                        </audio>
                        <div class="audio-visual">
                            <div class="bar" style="animation-delay: 0s;"></div>
                            <div class="bar" style="animation-delay: 0.1s;"></div>
                            <div class="bar" style="animation-delay: 0.2s;"></div>
                            <div class="bar" style="animation-delay: 0.3s;"></div>
                            <div class="bar" style="animation-delay: 0.4s;"></div>
                            <div class="bar" style="animation-delay: 0.5s;"></div>
                            <div class="bar" style="animation-delay: 0.6s;"></div>
                            <div class="bar" style="animation-delay: 0.7s;"></div>
                            <div class="bar" style="animation-delay: 0.8s;"></div>
                            <div class="bar" style="animation-delay: 0.9s;"></div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ url('/') }}/albumlist" class="btn btn-back">Back to Album List</a>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function showVisual(audio) {
        let visual = audio.nextElementSibling;
        visual.style.display = 'flex';
        audio.classList.add('playing');
    }
    function hideVisual(audio) {
        let visual = audio.nextElementSibling;
        visual.style.display = 'none';
        audio.classList.remove('playing');
    }
</script>
</body>
</html>
