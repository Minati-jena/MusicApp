<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
 <table border="1">
 	<thead>
 	<tr> 
 		<td>sl.no</td>
 		<td>song</td>
 	  </tr>
 	</thead>
     <?php $i = 0; 
           if (@$_GET['page'] == '') { 
               $i = 0; 
               } else {
                $i = (@$_GET['page'] - 1) * 5; } ?>

 	  <tbody>
           @foreach($lists as $list)
 	  	<tr>
 	  		<td>{{++$i}}</td>
 	  		
 	  		<td>
 	  			<audio controls>
                    <source src="{{ url('/') }}/audios/{{ $list->audio }}" type="audio/mpeg" alt="{{ $list->audio }}">
                      Your browser does not support the audio element.
                 </audio>
           
 	  		</td>

 	  	</tr>
 	  	@endforeach
 	  </tbody>
 </table>
 <a href="{{ url('/') }}/albumlist"></a>

</body>
</html>