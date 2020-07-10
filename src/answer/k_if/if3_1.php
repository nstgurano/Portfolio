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
    
    //devideだけで処理を終わらせる場合
    function devide($nums){
        $multiple_A=3;
        $multiple_B=7;
        $br="<br>";
        foreach($nums as $x){
            if($x%$multiple_A===0 && $x%$multiple_B===0){
                echo $x."は".$multiple_A."の倍数かつ".$multiple_B."の倍数です。".$br;
            }elseif($x%$multiple_A===0){
                echo $x."は".$multiple_A."の倍数です。".$br;
            }elseif($x%$multiple_B===0){
                echo $x."は".$multiple_B."の倍数です。".$br;
            }else{
                echo $x."は".$multiple_B."の倍数でも".$multiple_A."の倍数でもありません。".$br;
            }
        }
    }
    
    
  ?>

</body>
</html>