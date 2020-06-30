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

  quickSort($a,0,$b-1);

  function quickSort(&$a,$first,$last)
  {
    echo '【初期値】';
    echo '<br>';
    foreach ($a as $key) {
      echo $key.'&nbsp';
    }
    echo '<br>';

  do{
    $firstpoint=$first;//
    $lastpoint=$last;//
    $center=$a[intval($firstpoint+$lastpoint)/2];//
    $left=[];//
    $right=[];//

    while ($a[$lastpoint]>$a[$center]) {//
      $lastpoint--;
    }

    while ($a[$firstpoint]<$a[$center]) {//
      $firstpoint++;
    }

    echo $a[$firstpoint].'と'.$a[$lastpoint].'を交換します';
    if ($firstpoint<=$lastpoint) {//
      $tmp=$a[$lastpoint];
      $a[$lastpoint]=$a[$firstpoint];
      $a[$firstpoint]=$tmp;
      $firstpoint++;//
      $lastpoint--;
    }

    echo '<br>';
    foreach ($a as $key) {
      echo $key.'&nbsp';
    }
    echo '<br>';

  }while ($firstpoint<=$lastpoint);//

    if ($first<$lastpoint) {
     quickSort($a,$first,$lastpoint);
    }
    if ($firstpoint<$last) {
     quickSort($a,$firstpoint,$last);
    }
  }

  ?>

</body>
</html>