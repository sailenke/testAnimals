<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Test</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
</head>
<body>
	<div class="" style="padding: 20px; margin: auto; width: 500px">
		<h3 style="padding: 10px; border: 1px solid #fff; border-radius: 5px; margin: 0">КАКИЕ ЖИВОТНЫЕ У ВАС ЕСТЬ? </h2>
		<form enctype="multipart/form-data" method="POST">
		  <?php
		  $animals = ['Кошка', 'Собака', 'Попугай', 'Рыбки', 'Рептилии'];
		  $x = 1;
		  foreach ($animals as $key) {
			echo "<input type=\"checkbox\" name=\"".$x."\" value=\"".$x."\" class=\"input\"> ".$key."<br>";
			$x = $x*2;
		  }

		  ?>
		  <input type="checkbox" name="no_animals" value="0" class="input"> ЖИВОТНЫЕ ОТСУТСТВУЮТ<br>
		  <input type="submit" class="btn btn-success" value="Отправить" style="margin-top: 10px;">
		</form>
		<br>
		<form>
		  <div>
		  Хранилище ответов <input type="text" id="result" class="form-control" style="width: 50px; text-align: center; margin-left: 5px; display: inline-block;">
		  </div>
		  <div id="error" style="color: red;"></div>
		</form>
	</div>

<script>
  function stopAnimals(elem) {
  	$(elem).prop('checked', true);
  	$('.input').not(elem).prop('checked', false).prop('disabled', true);
  	$('#result').val(0);  	
  }

$(document).ready(function(){
  $('input[name=1], input[name=2], input[name=16]').prop('checked', true);
  $('#result').val(19);

  $('#result').blur(function(){
	  var value = $('#result').val();
	  $('.input').prop('checked', false).prop('disabled', false);
	  $('#error').text('');
	  var string = parseInt(value).toString(2).split('').reverse();

	  if(value == 0) {
	  	stopAnimals($('input[name=no_animals'));
	  }

	  for(var x = string.length - 1; x >= 0; x--) {
	  	if(string[x] == 1) {
	  		if($('input[name='+Math.pow(2, x)+']').length) {
	  			$($('input[name='+Math.pow(2, x)+']')).prop('checked', true);
	  		} else {
	  			$('#error').text('Такого животного нет!');
	  		}
	  	}
	  }
  });

  $('input[name=no_animals').click(function(){
	stopAnimals(this);
  });

  $('.input').click(function(){
	var sum = 0;
	var arr = $('input.input:checked');
	arr.each(function(index, el){
		var pr = el.value;
		sum += parseInt(pr);
	});
	$('#result').val(sum);
  });
});
</script>

</body>
</html>