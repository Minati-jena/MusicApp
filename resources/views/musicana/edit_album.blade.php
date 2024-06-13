<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Album</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            background-color: #ccc;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            max-width: 800px; 
        }
        h2 {
            color: #333333;
            font-weight: bold;
            margin-bottom: 15px;
            text-align: center;
        }
        .form-group label {
            color: #555555;
            font-weight: bold;
        }
        .custom-file-label::after {
            content: "Choose file";
        }
        .album-photo {
            max-width: 10%; 
            height: 50;
            margin-top: 10px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.4);
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 20px;
            transition: background-color 0.3s ease;
            width: 100%; 
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            border-radius: 20px;
            transition: background-color 0.3s ease;
            width: 100%; 
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #5a6268;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2>Edit Album</h2>
    @if(isset($message))
    <div class="alert alert-info text-center">
        {!! $message !!}
    </div>
    @endif
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title*</label>
            <input type="text" name="title" id="title" class="form-control" value="{{$data->title}}" required>
        </div>
        <div class="form-group">
            <label for="photo">Photo</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="photo" accept="image/*" name="photo" value="{{$data->photo}}">
                <label class="custom-file-label" for="photo">Choose file</label>
            </div>
        </div>
        <img src="{{url('/')}}/photos/{{$data->photo}}" alt="Album Photo" class="img-fluid album-photo">
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Update</button>
           
        </div>
         <a href="{{ url('/') }}/albumlist" >Album List</a>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
