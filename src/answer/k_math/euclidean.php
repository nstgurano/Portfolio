<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>euclidean</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

  <?php
    
    // 2つの引数を取りその最大公約数を返すメソッドeuclidean を作成して返り値をechoして下さい。
    $num1=rand(1,1000);
    $num2=rand(1,1000);
    $br='<br>';

    echo "引数は【{$num1}】と【{$num2}】です。{$br}";
    euclidean($num1,$num2);

    function euclidean($num1,$num2)
    {
      $remainder=$num1%$num2;
      while ($remainder!==0) {
        $num1=$num2;
        $num2=$remainder;
        $remainder=$num1%$num2;
      }
      echo '最大公約数は'.$num2;

    }
    ?>

</body>
</html>