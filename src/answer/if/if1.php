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
    if (9800<$x) {
      echo '変数xは9800より大きいです。'.'<br>';
    }


    $y = 77 * 77;
    // if文を用いて、$yが6000より大きい場合に
    // 変数xは9800より大きいです。とechoさせてください。
    if (6000<$y) {
      echo ' 変数xは9800より大きいです。'; // 変数yは6000より大きいです。←では？？
    }
    
  ?>

</body>
</html>