<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>repeat5</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

  <?php
      $scores = array('数学' => 70, '英語' => 90, '国語' => 80);
    // 連想配列$scoresのキーを変数$key、値を変数$valueとするforeach文を書いてください。
    // 各教科の点数が、「数学は70点です。」のように出力されるようechoしてください。
    
    $is="は";
    $points="点です。";
    
    $print="";
    foreach($scores as $key => $value){
        $print.=$key.$is.$value.$points;
    }
    echo $print;
    
  ?>

</body>
</html>