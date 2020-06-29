<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>repeat4</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

  <?php
    // for文を用いて1から1000までの数字をechoしてください。
    // ただし、3の倍数の場合はechoせずにcontinueを用いて次の数字に飛んでください。
    // echoするときに改行も入れるようにしてください。
    
    $start=1;
    $end=1000;
    $multiple=3;
    $br="<br>";
    
    for($i=$start;$i<=$end;$i++){
        if($i%$multiple===0){
            continue;
        }
        echo $i.$br;
    }
    
  ?>

</body>
</html>