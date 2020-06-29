<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>repeat3</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

  <?php
    // for文を用いて1から1000までの数字をechoしてください。
    // ただし、501以上の数字を表示しないようにbreak文を用いてfor文を抜けてください。
    // echoするときに改行も入れるようにしてください。
    
    $start=1;
    $end=1000;
    $threshold=501;
    $br="<br>";
    
    for($i=$start;$i<=$end;$i++){
        if($i>=$threshold){
            break;
        }
        echo $i.$br;
    }
    
  ?>

</body>
</html>