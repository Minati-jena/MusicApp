<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>List of Music</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/598de9b296.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
        .center {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .button-spacing {
            margin-left: 5px; /* Adjust as needed */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">List of Music({{$total}})</h2>
         <div class="d-flex justify-content-center mb-3">
            <form class="form-inline" action="{{url('/')}}/musiclist" method="POST">
                @csrf
                <div class="input-group">
                    <input type="search" class="form-control" id="data" name="data" value="{{@$_POST['data']}}" placeholder="Search...">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
        <form id="musicForm" action="" method="POST">
            @csrf
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col"><input type="checkbox" id="selectAll"></th>
                        <th scope="col">SL.NO</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Title</th>
                        <th scope="col">Audio</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; 
                        if (@$_GET['page'] == '') { 
                            $i = 0; 
                        } else { 
                            $i = (@$_GET['page'] - 1) * 5; 
                        } 
                    ?>
                    @foreach($datas as $data)
                    <tr>
                        <td><input type="checkbox" name="music_ids[]" value="{{ $data->id }}" class="selectSingle"></td>
                        <td>{{ ++$i }}</td>
                        <td><img src="{{ url('/') }}/photos/{{ $data->photo }}" alt="{{ $data->title }}" width="50" class="img-thumbnail"></td>
                        <td>{{ $data->title }}</td>
                        <td>
                            <audio controls>
                                <source src="{{ url('/') }}/audios/{{ $data->audio }}" type="audio/mpeg" alt="{{ $data->audio }}">
                                Your browser does not support the audio element.
                            </audio>
                        </td>
                        <td>
                            <a href="{{ url('/') }}/edit_music/{{ Crypt::encrypt($data->id) }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="{{ url('/') }}/delete_music/{{ $data->id }}" class="btn btn-danger btn-sm" onclick="return ask()"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center mb-4">
                <button type="button" class="btn btn-danger" id="deleteSelected">                            <a href="{{ url('/') }}/delete_music/{{ $data->id }}" class="btn btn-danger btn-sm" onclick="return ask()">Delete</a></button>
                <a href="{{ url('/') }}/addmusic" class="btn btn-primary">Add Music</a>
            </div>
        </form>
    </div>

    <script>
        function ask() {
            return confirm("Are you sure to delete?");
        }

        $(document).ready(function() {
            $('#selectAll').click(function() {
                $('.selectSingle').prop('checked', this.checked);
            });

            $('.selectSingle').click(function() {
                if ($('.selectSingle:checked').length == $('.selectSingle').length) {
                    $('#selectAll').prop('checked', true);
                } else {
                    $('#selectAll').prop('checked', false);
                }
            });

            $('#deleteSelected').click(function() {
                if ($('.selectSingle:checked').length > 0) {
                    if (confirm('Are you sure you want to delete the selected music items?')) {
                        $('#musicForm').submit();
                    }
                } else {
                    alert('Please select at least one music item to delete.');
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
