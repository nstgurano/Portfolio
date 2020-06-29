<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>repeat1</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

  <?php
    // for文を用いて、51から100までの数字を
    // echoしてください。echoするときに改行も入れるようにしてください。

    $start=50;
    $end=100;
    $br="<br>";
    
    for ($i=$start;$i<=$end;$i++) {
        echo $i.$br;
    }
  ?>

</body>
</html>