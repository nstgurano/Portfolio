<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Hanoi</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

  <?php
  // $n　移動させる円盤の枚数
  // $from　移動元の棒の名前
  // $work　作業用に使う棒の名前
  // $dest　移動先の棒の名前
  // 上の4個を引数とする、ハノイの塔を実現するメソッドHanoiを作成してください。
  // 出力例: Hanoi(3,"A","B","C");
  // Move the disc from A to C.
  // Move the disc from A to B.
  // Move the disc from C to B.
  // Move the disc from A to C.
  // Move the disc from B to A.
  // Move the disc from B to C.
  // Move the disc from A to C.

Hanoi(3,"A","B","C");

function Hanoi($n, $from, $work, $dest) {//すべての円盤のゴールはC（dest）
  if ($n>0) {//移動させる円盤の数は0以上である、再起処理終了条件
    Hanoi($n-1,$from,$dest,$work);//n-1分の円盤をBへ移す、destの値（work作業用）とworkの値（dest移動先）が入れ替わり、Cは作業用で使う
    echo 'Move to the disk '.$n.' from '.$from.' to '.$dest;
    echo '<br>';
    Hanoi($n-1,$work,$from,$dest);//上記で動かした円盤n枚のうち一枚は必ずAに移動する必要がある、A⇔Bの移動をして、最終的にCに移動
  }
}

  ?>

</body>
</html>