<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Music</title>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
<h2>Edit Music</h2>

@if(isset($message))
<center>{!! $message !!}</center>
@endif

<form action="" method="POST" enctype="multipart/form-data">
  @csrf

  <label>
    <select id="album" name="album">
      <option value="" selected>Select album</option>
      @foreach($albums as $album)
        <option value="{{ $album->id }}" {{ $album->id == $data->album_id ? 'selected' : '' }}>
          {{ $album->title }}
        </option>
      @endforeach
    </select>
  </label>
  <br>

  <label>Title*<input type="text" name="title" id="title" required value="{{ $data->title }}"></label><br>

  @if($data->audio)
    <label>Current Audio: <audio controls><source src="{{ url('/audios/' . $data->audio) }}" type="audio/mp3">Your browser does not support the audio element.</audio></label><br>
  @endif

  <label>Audio<input type="file" name="audio" id="audio" accept="audio/mp3"></label><br>

  @if($data->photo)
    <label>Current Photo: <img src="{{ url('/photos/' . $data->photo) }}" alt="{{ $data->title }}" width="100"></label><br>
  @endif

  <label>Photo<input type="file" id="photo" name="photo" accept="image/*"></label><br>

  <button type="submit">Save</button>
</form>

<a href="{{ url('/musiclist') }}">Music List</a>

</body>
</html>
