<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>selectionsort</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

  <?php
  // 選択ソートを使用して配列$aの値を小さい順番に並べて下さい。
  // 10 3 1 4 2
  // 10と1を交換します。
  // 1 3 10 4 2
  // 3と2を交換します。
  // 1 2 10 4 3
  // 上のように実行の過程も表示してください。
  $a = array(10,3,1,4,2);
  $b=count($a);

  selectionSort($a,$b);
  
  function  selectionSort($a,$b)
  {
    echo '【初期設定値】'.'<br>';
    foreach ($a as $key) {
      echo $key.'&nbsp';
    }
    echo '<br>';

    for ($i=0; $i < $b-1; $i++) {
      $min= $a[$i];
      $key=$i;

      for ($x=$i+1; $x <$b ; $x++) {
        if ($min > $a[$x]) {
          $min=$a[$x];
          $key=$x;
        }
      }
      echo '<br>';
      if ($key===$i) {
        continue;
      }

      $tmp=$a[$i];
      $a[$i]=$a[$key];
      $a[$key]=$tmp;
      
      echo $a[$i].'と'.$a[$key].'を交換します';
      echo '<br>';
      foreach ($a as $key) {
        echo $key.'&nbsp';
      }
      echo '<br>';
 
    }

    echo '<br>';
    echo '【ソート終了】';
    echo '<br>';
    foreach ($a as $key) {
      echo $key.'&nbsp';
    }
    echo'<br>';
  }
  ?>

</body>
</html>