<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>fizz&buzz</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

  <?php
    // 1から100までの数をechoしてください。
    // 3の倍数の時には数の代わりに「Fizz」をechoしてください。
    // 5の倍数の時には数の代わりに「Buzz」をechoしてください。
    // 3と5両方の倍数の時には数の代わりに「FizzBuzz」をechoしてください。
    // echoするときに改行も入れるようにしてください。
    for ($i=1; $i <=100 ; $i++) { 
      if ($i%3===0&&$i%5===0) {
        echo 'FizzBuzz'.'<br>';
      }elseif ($i%3===0) {
        echo'Fizz'.'<br>';
      }elseif($i%5===0){
        echo 'Buzz'.'<br>';
      }else{
        echo $i.'<br>';
      }
    }
  ?>

</body>
</html>