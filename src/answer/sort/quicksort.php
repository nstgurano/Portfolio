<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>quicksort</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

  <?php
    $a = [10,3,11,1,9,7,6,8,2,4,5];
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
    $center=ceil(($firstpoint+$lastpoint)/2);//真ん中の要素（切り捨て）
  while ($firstpoint<=$lastpoint) {//
    while ($a[$firstpoint]<$a[$center]) {//真ん中と左を比べて、左が小さいなら一つ右に行く
      $firstpoint++;
    }

    while ($a[$lastpoint]>$a[$center]) {//真ん中と右を比べて、右が小さいなら一つ左に行く
      $lastpoint--;
    }


    if ($firstpoint>=$lastpoint) {//右と左が重なったら終了
    break;

    }elseif ($firstpoint<=$lastpoint) {//左から右の中の要素に調べる要素がある場合、以下実行
      echo'基準値は【'.$a[$center].'】、【'. $a[$firstpoint].'】と【'.$a[$lastpoint].'】を交換します';
      $tmp=$a[$lastpoint];
      $a[$lastpoint]=$a[$firstpoint];
      $a[$firstpoint]=$tmp;

      $firstpoint++;//次の要素を確認するために左と右どちらも進む
      $lastpoint--;
    }
    echo '<br>';
    foreach ($a as $key) {
      echo $key.'&nbsp';
    }


    echo '<br>';

    if ($first<$lastpoint) {//真ん中より左の要素にソートできるものがある場合、再起処理
      quickSort($left, $first , $lastpoint);//引数は若干ソートされたa、左端の要素、真ん中の要素
    }
    if ($firstpoint<$last) {//真ん中より右の要素にソートできるものがある場合、再起処理
      quickSort($right, $firstpoint,$last);//引数は若干ソートされたa、真ん中の要素、右端の要素
    }
  }

  }

  ?>

</body>
</html>