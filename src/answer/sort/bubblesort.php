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
    $a_count=count($a);//配列の要素数

    echo '【初期値】'.'<br>';
    foreach ($a as $key) {///初期設定値
      echo $key.'&nbsp';
    }
    echo '<br>';

    bubble($a,$a_count);
    
    echo '<br>';
    echo '【ソート終了値】'.'<br>';
    foreach ($a as $key) {///ソート終了値
      echo $key.'&nbsp';
    }
    echo '<br>';
    
    function bubble(&$a,$a_count)//$aは参照渡しで変化させて元の配列に返す
    {

      echo '【入れ替え値】'.'<br>';
      for ($i=0; $i <$a_count ; $i++) { //要素の数からー１分の(n-1)交換を繰り返す
        for ($j=1; $j <$a_count ; $j++) { //0番目の要素と1番目の要素から調べるため、初期値は１、配列の要素の数－１まで調べる
          if ($a[$j-1]>$a[$j]) {//左から順番に比較をして、小さいものを左へ入れ替える
            echo $a[$j-1].'と'.$a[$j].'を'.'入れ替え'.'<br>';

            $tmp=$a[$j];//以下、入れ替え処理
            $a[$j]=$a[$j-1];
            $a[$j-1]=$tmp;
              foreach ($a as $a_value) {///入れ替え値出力
                echo $a_value.'&nbsp';
              }
              echo '<br>';
          }
        }
      }
    }

  ?>

</body>
</html>