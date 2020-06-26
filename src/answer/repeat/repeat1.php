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
    for ($i=51; $i <= 100; $i++) {
      $num=$i;
      if ($num<100) {
        $num.='<br>';
      }
      echo $num;
    }
  ?>

</body>
</html>