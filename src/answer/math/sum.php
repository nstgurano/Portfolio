<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>sum</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

  <?php
    
    // 1から100までの奇数の和を計算してechoして下さい。
    $sum = 0;
    for ($i=1; $i <=100 ; $i++) { 
      if ($i%2===0) {
        continue;
      }
      $sum+=$i;
    }
    echo $sum;
    ?>

</body>
</html>