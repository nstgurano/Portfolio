<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>quicksort</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

  <?php
    $a =range(0,10);// [10,3,1,9,7,6,8,2,4,5];//
    shuffle($a);//配列をシャッフル
    $a_last=count($a)-1;
  // クイックソートを使用して配列$aの値を小さい順番に並べて下さい。
  // 10 3 1 9 7 6 8 2 4 5
  // 範囲:0-9 基準値: 7 [0]と[9]を入れ替え
  // 5 3 1 9 7 6 8 2 4 10
  // 範囲:0-9 基準値: 7 [3]と[8]を入れ替え
  // 5 3 1 4 7 6 8 2 9 10
  // 上のように実行の過程も表示してください。

  echo '【初期値】';
  echo '<br>';
  foreach ($a as $key) {
    echo $key.'&nbsp';
  }
  echo '<br>';
  quickSort($a,0,$a_last);//引数は配列a、配列の最初の要素、配列の最後の要素

  function quickSort(&$a,$first,$last)//
  {
    $firstpoint=$first;//左から始まる要素
    $lastpoint=$last;//右から始まる要素
    $pivod=$a[$firstpoint];//基準値は調べ始めの要素

    if ($firstpoint>=$lastpoint) {//左と右が重なったらソート終了
      return;
    }

    while ($firstpoint<=$lastpoint) {//左から右に探索して重なるまで続ける
      while ($a[$firstpoint]<$pivod) {//真ん中と左を比べて、左が小さいなら一つ右に行く
          $firstpoint++;
      }

      while ($pivod<$a[$lastpoint]) {//真ん中と右を比べて、右が小さいなら一つ左に行く
          $lastpoint--;
      }


      if ($firstpoint>=$lastpoint) {//左と右が重なったらこの中での処理は終了
      break;
      }
      echo "左の現在地は【{$firstpoint}】、右の現在地は【{$lastpoint}】".'<br>';
      echo'基準値は【'.$pivod.'】、【'. $a[$firstpoint].'】と【'.$a[$lastpoint].'】を交換します'.'<br>';
      $tmp=$a[$firstpoint];//以下、左の要素と右の要素の入れ替え
      $a[$firstpoint]=$a[$lastpoint];
      $a[$lastpoint]=$tmp;
      $firstpoint++;//次の要素を確認するために左と右どちらも進む
      $lastpoint--;

      foreach ($a as $key) {
        echo $key.'&nbsp';
      }
      echo '<br>';
    }

      quickSort($a, $first , $firstpoint-1);//左の要素、左端の要素、左のポインターが進んだ
      quickSort($a, $lastpoint+1,$last);//右の要素、右の要素の始まり、右端の要素
  }

  ?>

</body>
</html>