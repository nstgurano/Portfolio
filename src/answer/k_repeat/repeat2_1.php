<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>repeat2</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

  <?php
    $i = 2;
    // while文と変数$iを用いて、2から100までの偶数をechoしてください。
    // echoするときに改行も入れるようにしてください。
    
    $end=100;
    $br="<br>";
    
    while($i<=$end){
        if($i%2===0){
            echo $i.$br;
        }
        $i++;
    }
    
  ?>

</body>
</html>