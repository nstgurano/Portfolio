<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>average</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

  <?php
    
    // $numsに数字の配列が代入されています。この配列の数字の平均値をechoして下さい。
    $nums = array(1,2,3,4,5);
    foreach ($nums as $key) {
      $sum +=$key;
    }
    $average=$sum/count($nums);

    echo $average;
  ?>

</body>
</html>