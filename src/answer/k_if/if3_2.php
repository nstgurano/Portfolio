<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>if3</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

  <?php
    $nums = array(1071,30,35,58);
    // if-elseif-else文を用いて、
    // $xが3の倍数かつ7の倍数の場合は「xは3の倍数かつ7の倍数です。」
    // それ以外で3の倍数の場合は「xは3の倍数ですが7の倍数ではありません。」
    // それ以外で7の倍数の場合は「xは7の倍数ですが3の倍数ではありません。」
    // それ以外の場合は「xは7の倍数でも3の倍数でもありません。」
    // と上記の配列$numsの要素全てについてechoするメソッドdivide($nums)を作成して実行してください。
    // 例:1071は3の倍数かつ7の倍数です。
    // echoするときに改行も入れるようにしてください。
    
    devide($nums);
    
    //devideにforeach部分のみを書き、multiに倍数判定の処理を書く場合(処理を分離して読めるので多分こちらの方が読みやすい)
    function devide($nums){
        $multiple_A=3;
        $multiple_B=7;
        
        foreach($nums as $x){
            echo multi($x,$multiple_A,$multiple_B);
        }
    }
    
    
    function multi($x, $multi_A,$multi_B){
        $br="<br>";
        if($x%$multi_A===0 && $x%$multi_B===0){
            return "{$x}は{$multi_A}の倍数かつ{$multi_B}の倍数です。{$br}";
        }elseif($x%$multi_A===0){
            return "{$x}は{$multi_A}の倍数です。{$br}";
        }elseif($x%$multi_B===0){
            return "{$x}は{$multi_B}の倍数です。{$br}";
        }else{
            return "{$x}は{$multi_B}の倍数でも{$multi_A}の倍数でもありません。$br";
        }
    }
    
    
    
    
  ?>

</body>
</html>