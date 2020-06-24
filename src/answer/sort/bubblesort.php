<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>bubble sort</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

  <?php
  // バブルソートを使用して配列$aの値を小さい順番に並べて下さい。
  // 2 4 1 3
  // [1]と[2]を入れ替え
  // 2 1 4 3
  // [2]と[3]を入れ替え
  // 2 1 3 4
  // [0]と[1]を入れ替え
  // 1 2 3 4
  // 上のように実行の過程も表示してください。
    $a = array(2,4,1,3);
    $b=count($a);

    bubble($a,$b);
    
    
    function bubble($a,$b)
    {
      echo '【初期値】'.'<br>';
      foreach ($a as $key) {///初期設定値
        echo $key.'&nbsp';
      }
      echo '<br><br>';

      echo '【入れ替え値】'.'<br>';
    for ($i=0; $i <$b ; $i++) { 
      for ($x=1; $x <$b ; $x++) { 
        if ($a[$x-1]>$a[$x]) {
          $tmp=$a[$x];
          $a[$x]=$a[$x-1];
          $a[$x-1]=$tmp;
          foreach ($a as $key) {///入れ替え値
            echo $key.'&nbsp';
          }
          echo '<br>';
          echo $a[$x-1].'と'.$a[$x].'を'.'入れ替え'.'<br>';
          }
        }
      }

      echo '<br>';
      echo '【ソート終了値】'.'<br>';
      foreach ($a as $key) {///ソート終了値
        echo $key.'&nbsp';
      }
      echo '<br>';

    }

    // $b=count($a);
    // for ($i=0; $i <$b ; $i++) { 
    //   for ($x=1; $x <$b-1; $x++) { 
    //     if ($a[$x] < $a[$x-1]) {
    //       $tmp=$a[$x];
    //       $a[$x]=$a[$x-1];
    //       $a[$x-1]=$tmp;
    //     }
    //   }
    // }
    // foreach ($a as $key) {
    //   echo $key.'<br>';
    // }
  ?>

</body>
</html>