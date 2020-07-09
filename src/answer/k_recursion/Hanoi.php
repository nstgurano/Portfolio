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
    $br="<br>";
    Hanoi(3,"A","B","C");
    
    
    function Hanoi($n, $from, $work, $dest) {
        global $br;
        
        if($n>1){
            // 動かしたいディスクが2枚以上の時、一番下のディスクより上のn-1枚のディスクを動かすために再帰呼び出しを行う。
            // この時、移動元の棒はfrom(一番下のディスクと同じ)、移動の途中に使用する棒はdest、移動先はwork
            // 一番下のディスクをdestに動かすには、それより上のディスクをworkに移す必要があるため逆転する
            Hanoi($n-1, $from, $dest, $work);
            // 上記の再帰でn-1枚のディスクがworkに移った後、n枚目のディスクをdestに移動させる
            echo "Move the disc from {$from} to {$dest}.".$br;
            // n枚目のディスクがdestに移動できたので、workに移したn-1枚のディスクをdestに移動させるための再帰処理を行う
            Hanoi($n-1, $work, $from, $dest);
        }else{
            // 動かしたいディスクが1枚になるまで再帰呼び出しがされた時、from→destへの移動を行う
            echo "Move the disc from {$from} to {$dest}.".$br;
        }
    }

  ?>

</body>
</html>