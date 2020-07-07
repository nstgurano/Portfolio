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
  $b=count($a);//配列の要素数確認

  selectionSort($a,$b);
  
  function  selectionSort($a,$b)
  {
    echo '【初期設定値】'.'<br>';
    foreach ($a as $key) {
      echo $key.'&nbsp';
    }
    echo '<br>';

    for ($i=0; $i <=$b-1; $i++) {//線形探索で0番目から最後の配列まで調べる
      $min= $a[$i];//最小の初期値
      $key=$i;//最小値のキー

      for ($x=$i+1; $x <$b ; $x++) {//最小値の隣の要素から最後の一つ手前までを調べる
        if ($min > $a[$x]) {//出てきた数値が最小値よりも小さい場合
          $min=$a[$x];//最小値を更新
          $key=$x;//最小値のキーも更新
        }
      }
      
      echo '<br>';
      if ($key===$i) {//調べている数値が最小値であったら処理はスキップされる
        continue;
      }

      echo $a[$i].'と'.$a[$key].'を交換します'.'<br>';
      $tmp=$a[$i];//最小値と調べている数値の交換
      $a[$i]=$a[$key];
      $a[$key]=$tmp;
      

      echo '【交換後】'.'<br>';
        foreach ($a as $key) {
          echo $key.'&nbsp';
        }
      echo '<br>';
    }

    echo '【ソート終了】';
    echo '<br>';
    foreach ($a as $key) {
      echo $key.'&nbsp';
    }
  }
  ?>

</body>
</html>