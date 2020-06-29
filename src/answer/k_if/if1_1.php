<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>if1</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

  <?php
    $x = 99 * 99;
    // if文を用いて、$xが9800より大きい場合に
    // 変数xは9800より大きいです。とechoさせてください。
    
    
    // 変数名以外のecho内容を全て変数化して実行するパターン
    $valiable="変数";
    $is="は";
    $larger_than="より大きいです。";
    
    $x_threshold=9800;
    if($x>$x_threshold){
        echo $valiable."x".$is.$x_threshold.$larger_than;
    }
    

    $y = 77 * 77;
    // if文を用いて、$yが6000より大きい場合に
    // 変数xは9800より大きいです。とechoさせてください。
    
    $y_threshold=6000;
    if($y>$y_threshold){
        echo $valiable."x".$is.$x_threshold.$larger_than;
        echo $valiable."y".$is.$y_threshold.$larger_than."(たぶん本意はこっち)";
    }
    
  ?>

</body>
</html>