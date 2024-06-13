<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Music</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }
        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 0 auto;
        }
        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }
        form {
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        .audio-photo-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        .audio-container {
            display: flex;
            flex-direction: column;
        }
        .audio-controls {
            background-color: #f8f9fa;
            border: 1px solid #ced4da;
            border-radius: 5px;
            padding: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .audio-controls audio {
            width: 100%;
            margin-top: 10px;
            outline: none;
        }
        .photo-preview {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .btn-save {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
            transition: all 0.3s;
        }
        .btn-save:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .btn-back {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            background-color: #6c757d;
            border-color: #6c757d;
            color: #fff;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            transition: all 0.3s;
        }
        .btn-back:hover {
            background-color: #5a6268;
            border-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Music</h2>

        @if(isset($message))
        <div class="alert alert-info text-center">
            {!! $message !!}
        </div>
        @endif

        <form action="" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="album">Select Album</label>
                <select id="album" name="album" class="form-control">
                    <option value="" selected>Select album</option>
                    @foreach($albums as $album)
                        <option value="{{ $album->id }}" {{ $album->id == $data->album_id ? 'selected' : '' }}>
                            {{ $album->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="audio-photo-container">
                <div class="form-group audio-container">
                    <label for="audio">Audio</label>
                    <input type="file" class="form-control-file" id="audio" name="audio" accept="audio/mp3">
                    @if($data->audio)
                        <div class="audio-controls">
                            <audio controls>
                                <source src="{{ url('/audios/' . $data->audio) }}" type="audio/mp3">
                                Your browser does not support the audio element.
                            </audio>
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" class="form-control-file" id="photo" name="photo" accept="image/*">
                    @if($data->photo)
                        <img src="{{ url('/photos/' . $data->photo) }}" alt="{{ $data->title }}" class="photo-preview">
                    @endif
                </div>
            </div>

            <button type="submit" class="btn btn-save">Save</button>
        </form>

        <a href="{{ url('/musiclist') }}" class="btn btn-back mt-3">Back to Music List</a>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
