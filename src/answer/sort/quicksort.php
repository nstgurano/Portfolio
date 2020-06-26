<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>quicksort</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

  <?php
    $a = array(10,3,1,9,7,6,8,2,4,5);
  // クイックソートを使用して配列$aの値を小さい順番に並べて下さい。
  // 10 3 1 9 7 6 8 2 4 5
  // 範囲:0-9 基準値: 7 [0]と[9]を入れ替え
  // 5 3 1 9 7 6 8 2 4 10
  // 範囲:0-9 基準値: 7 [3]と[8]を入れ替え
  // 5 3 1 4 7 6 8 2 9 10
  // 上のように実行の過程も表示してください。
  $b=count($a);

  quikSort($a,$b);

  function quikSort($a,$b)
  {
    echo '【初期値】';
    echo '<br>';
    foreach ($a as $key) {
      echo $key.'&nbsp';
    }
    echo '<br>';

    $first=0;
    $last=$b-1;
    $center=floor($b/2);

    while ($a[$center]>$a[$last]) {
      $last--;
    }

    while ($a[$first]>$a[$center]) {
      $first++;
    }
    if ($a[$first]<=$a[$last]) {
      $tmp=$a[$first];
      $a[$first]=$a[$last];
      $a[$first]=$tmp;
      $first++;
      $last--;
    }


    echo '<br>';
    foreach ($a as $key) {
      echo $key.'&nbsp';
    }
    echo '<br>';
    echo $a[$first].'と'.$a[$last].'を交換します';
    echo '<br>';
  }

  ?>

</body>
</html>