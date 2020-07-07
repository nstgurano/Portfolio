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
  $b=count($a);//
  insertion($a,$b);

  function insertion($a,$b)
  {
    echo '【初期値】';
    echo '<br>';
    foreach ($a as $key) {
      echo $key.'&nbsp';
    }
    echo '<br>';

    for ($i=1; $i <$b ; $i++) {//初期値は１番目で最後の要素まで調べる
      $tmp=$a[$i];//調べた要素を保存
      for ($x=$i-1; 0<=$x ; $x--) {//初期値から一つずつ左に戻っていく
        echo  "【{$tmp}】と【{$a[$x]}】を比較します".'<br>';
        if ($tmp<$a[$x]) {//保存した値のほうが小さいならば交換
          echo '<br>'."【{$tmp}】と【{$a[$x]}】を交換".'<br>';
          $a[$x+1]=$a[$x];//比較したものと交換する
          $a[$x]=$tmp;
          var_dump($a);//交換できたか確認
        }else{
          break;//交換するものがなければ処理は終了
        }
      } 

      echo '【交換後】'.'<br>';
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