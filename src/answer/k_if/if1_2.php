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
    
    
    // 変数展開を用いてechoするパターン
    $x_threshold=9800;
    if($x>$x_threshold){
        echo "変数xは{$x_threshold}より大きいです。";
    }
    

    $y = 77 * 77;
    // if文を用いて、$yが6000より大きい場合に
    // 変数xは9800より大きいです。とechoさせてください。
    
    $y_threshold=6000;
    if($y>$y_threshold){
        echo "変数xは{$x_threshold}より大きいです。";
        echo "変数yは{$y_threshold}より大きいです。(たぶん本意はこっち)";
    }
    
  ?>

</body>
</html>