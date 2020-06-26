<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>insertionsort</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

  <?php
  // 挿入ソートを使用して配列$aの値を小さい順番に並べて下さい。
  // 9 6 5 1 2
  // 6の位置を決める1周目のループです。
  // [0]の位置に[1]を挿入
  // 6 9 5 1 2
  // 5の位置を決める2周目のループです。
  // [1]の位置に[2]を挿入
  // [0]の位置に[1]を挿入
  // 5 6 9 1 2
  // 上のように実行の過程も表示してください。
  $a = array(9,6,5,1,2);
  $b=count($a);
  insertion($a,$b);

  function insertion($a,$b)
  {
    echo '【初期値】';
    echo '<br>';
    foreach ($a as $key) {
      echo $key.'&nbsp';
    }
    echo '<br>';

    for ($i=1; $i <$b ; $i++) { 
      $tmp=$a[$i];
      var_dump($tmp);
      for ($x=$i-1; 0<=$x ; $x--) { 
        if ($tmp<$a[$x]) {
          $a[$x+1]=$a[$x];
        }else{
          break;
        }
      }
      $a[$x+1]=$tmp;
      
      echo'<br>';
      echo $a[$i].'と'.$a[$key].'を交換します';
      echo '<br>';
      foreach ($a as $key) {
        echo $key.'&nbsp';
      }
      echo '<br>';
    }

    echo '<br>';
    echo '【ソート終了値】'.'<br>';
    foreach ($a as $key) {///ソート終了値
      echo $key.'&nbsp';
    }
    echo '<br>';
  }
  ?>

</body>
</html>