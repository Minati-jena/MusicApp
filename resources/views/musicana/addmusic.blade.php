<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Music</title>
   <!--  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
crossorigin="anonymous"></script> -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>   

</head>
<body>
<h2>Add music</h2>
@if(isset($message))
<center>{!! $message !!}</center>
@endif
 <form action="" method="POST" enctype="multipart/form-data">
    @csrf  
          <?php
          $albums=DB::select("select* from albums");
         ?>

                <label>
               <select id="album"  name ="album" >
                  <option value="" selected>select album</option>
                 @foreach($albums as $album)
                  <option value="{{$album->id}}">{{$album->title}}</option>
                @endforeach
              </select>
              </label>

            
   <label>Title*<input type="text" name="title"id="title" required> </label><br>
   
   <label>Audio<input  type="file" name="audio" id="audio" accept="audio/mp3"/ required><label><br>

   <label>Photo: <input type="file" id="photo" accept="image/*" name="photo" ></label><br>
    <button type="submit">save</button>
  </form>
  <a href="{{url('/')}}/musiclist">Music list</a>

 
     

        
</body>
</html>