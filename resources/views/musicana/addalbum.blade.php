<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Album</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            color: #333;
            background-color: #f8f9fa; 
        }
        .main-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 50px); 
            padding: 20px;
        }
        .content-container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            width: 100%;
        }
        h2 {
            color: #333;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .form-group label {
            color: #555;
            font-weight: bold;
        }
        .btn-primary, .btn-secondary {
            border-radius: 50px;
            transition: transform 0.2s;
            width: 100%;
            margin-top: 10px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
            transform: scale(1.05);
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            color: #fff;
            text-decoration: none;
            display: block;
            text-align: center;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #5a6268;
            transform: scale(1.05);
        }
        .alert {
            margin-bottom: 20px;
        }
        .img-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }
        .img-container img {
            max-width: 100%;
            max-height: 100%;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    @include('musicana.header')
   
    <div class="main-container">
        <div class="content-container">
            <div class="row">
                <div class="col-md-6 img-container">
                    <img src="https://images.unsplash.com/photo-1508700115892-45ecd05ae2ad?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTZ8fG11c2ljfGVufDB8fDB8fHww" alt="Album Image" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h2 class="text-center">Add Album</h2>
                    @if(isset($message))
                    <div class="alert alert-info text-center">
                        {!! $message !!}
                    </div>
                    @endif
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title*</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                            @error('title')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <input type="file" class="form-control-file" id="photo" accept="image/*" name="photo">
                            @error('photo')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                    <a href="{{ url('/') }}/albumlist" class="btn btn-secondary mt-3">Album List</a>
                    <a href="{{ url('/') }}/logout" class="btn btn-secondary mt-3">LogOut</a>
                </div>
            </div>
        </div>
    </div>
    
    @include('musicana.footer')

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
