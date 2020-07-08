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
    echo $colors[0].$br;
    // 要素数を取得し、その値を-1したものが最後の配列番号になる
    echo $colors[count($colors)-1].$br;
    
  ?>

</body>
</html>