<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>maxmin</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

  <?php
    
    // $numsに数字の配列が代入されています。この配列の数字の最大値を返すメソッドmaxOfを作成して実行して返り値をechoして下さい。
    // echoするときに改行も入れるようにしてください。
    // 同様にこの配列の数字の最小値を返すメソッドminOfを作成して実行して返り値をechoして下さい。
    $nums = array(7,5,3,34,2,-3,6,-2);
    
    maxOf($nums);
    minOf($nums);

    function maxOf($nums)
    {
      echo max($nums).'<br>';
    }

    function minOf($nums)
    {
      echo min($nums).'<br>';
    }

    ?>

</body>
</html>