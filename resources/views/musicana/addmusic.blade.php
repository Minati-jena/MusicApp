<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Music</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>   
    <style>
        body {
            background-image: url(''); 
            background-size: cover;
            background-position: center;
            font-family: 'Roboto', sans-serif;
            color: #333;
            padding-top: 50px;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
            padding: 20px;
        }
        .form-group label {
            color: #555;
            font-weight: bold;
        }
        .btn-primary, .btn-secondary {
            border-radius: 50px;
            width: 48%;
            transition: background-color 0.3s ease;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            margin-right: 2%;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            color: #fff;
            text-decoration: none;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
        .img-fluid {
            border-radius: 10px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Add Music</h2>
    <div class="row">
        <div class="col-md-6">
            @if(isset($message))
            <div class="alert alert-info text-center">
                {!! $message !!}
            </div>
            @endif
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf  
                <?php
                $albums=DB::select("select* from albums");
                ?>
                <div class="form-group">
                    <label for="album">Select Album</label>
                    <select id="album"  name ="album" class="form-control">
                        <option value="" selected>Select album</option>
                        @foreach($albums as $album)
                        <option value="{{$album->id}}">{{$album->title}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="title">Title*</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="audio">Audio*</label>
                    <input type="file" name="audio" id="audio" class="form-control" accept="audio/mp3" required>
                </div>

                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" id="photo" name="photo" class="form-control" accept="image/*">
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{url('/')}}/musiclist" class="btn btn-secondary">Music list</a>
                </div>
            </form>
        </div>
        <div class="col-md-6 d-flex justify-content-center align-items-center">
            <img src="https://i.makeagif.com/media/6-01-2016/vD9RYr.gif" alt="Music Image" class="img-fluid">
        </div>
    </div>
</div>
</body>
</html>
