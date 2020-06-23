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
    $colors=['赤','青','黄'];
    // $colorsの最初の要素をechoしてください。
    echo $colors[0].'<br>';
    // $colorsの末尾に白を追加し、$colorsの最後の要素をechoしてください。
    $colors[]='白';
    echo $colors[3].'<br>';

  ?>

</body>
</html>