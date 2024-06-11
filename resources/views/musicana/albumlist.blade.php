<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>List of Album</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/598de9b296.js" crossorigin="anonymous"></script>
    <style>
        .center {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .button-spacing {
            margin-left: 5px;
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <h2 class="text-center mb-4">List of Album ({{$total}})</h2>
       <div class="d-flex justify-content-center mb-3">
            <form class="form-inline" action="" method="POST">
                @csrf
                <div class="input-group">
                    <input type="search" class="form-control" id="data" name="data" value="{{@$_POST['data']}}" placeholder="Search...">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
        <form id="albumForm" action="" method="POST">
            @csrf
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col"><input type="checkbox" id="selectAll">Select All</th>
                        <th scope="col">SL.NO</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Title</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0; 
                        if (@$_GET['page'] == '') { 
                            $i = 0; 
                        } else {
                         $i = (@$_GET['page'] - 1) * 5; } ?>
                    @foreach($datas as $data)
                    <tr>
                        <td><input type="checkbox" name="album_ids[]" value="{{ $data->id }}" class="selectSingle"></td>

                        <td>{{ ++$i }}</td>
                        <td> <a href="{{url('/')}}/listofsong/{{$data->id}}"><img src="{{url('/')}}/photos/{{$data->photo}}" alt="{{$data->title}}" width="50" class="img-thumbnail"></a>
                        </td>
                        <td>{{$data->title}}</td>
                        <td class="center">
                            <button class="btn btn-primary btn-sm button-spacing"><a href="{{url('/')}}/edit_album/{{Crypt::encrypt($data->id)}}" class="text-white"><i class="fa-solid fa-pen-to-square"></i></a></button>

                            <button class="btn btn-danger btn-sm button-spacing"><a href="{{url('/')}}/delete_album/{{$data->id}}" class="text-white" onclick="return ask();"><i class="fa-solid fa-trash"></i></a></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center mb-4">
                <button type="button" class="btn btn-danger" id="deleteSelected">Delete</button>
                <button class="btn btn-success"><a href="{{ url('/') }}/addalbum" class="text-white">Add Album</a></button>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
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
                    if (confirm('Are you sure you want to delete the selected albums?')) {
                        $('#albumForm').submit();
                    }
                } else {
                    alert('Please select at least one album to delete.');
                }
            });
        });
    </script>
</body>
</html>
