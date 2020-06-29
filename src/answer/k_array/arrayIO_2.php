<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>arrayIO</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

  <?php
    // $colorsという配列を作り、赤、青、黄の順番に入れてください。

    // $colorsの最初の要素をechoしてください。

    // $colorsの末尾に白を追加し、$colorsの最後の要素をechoしてください。
    $colors=array("赤","青","黃");
    $br="<br>";
    // 配列の内部ポインタを先頭に戻し、その値を返すのがreset
    echo reset($colors).$br;
    // resetの逆の動作をするのがend
    echo end($colors).$br;
    
  ?>

</body>
</html>