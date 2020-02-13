<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>My dictionary</title>
    <style>
    *{
        margin: 0;
        padding: 0;
    }

    body {
        background-color: #e0e0e0
    }

    h1{
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translateX(-50%) translateY(-50%);
        text-align: center;
        font-family: Pacifo, Calibri;
        font-size: 5em;
    }
    button{
        position: absolute;
        top:50%;
        right: 0;
    }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>
<body>
  <?php 
  $json_str = json_encode($words);
  ?>
 
	<h1 id="word">load...</h1>
    
</body>
<script>
$(function () {
  count = 0;
  var word = <?php echo json_encode($json_str); ?>;
  let wordsArray = JSON.parse(word);

  setInterval(function () {
    var randomItem = wordsArray[Math.floor(Math.random()*wordsArray.length)];
    $("#word").fadeOut(150, function () {
     
      $(this).text(randomItem).fadeIn(150);
    });
  }, 1600);
});
</script>
</html>