<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>square</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

  <?php
    // アスタリスクで正方形を作って出力するメソッド square($n) を宣言して実行して下さい。
    // ex square(5) の場合の出力
    // 	  *****
    //    *****
    //    *****
    //    *****
    //    *****
    $n=rand(2,5);
    square($n);

    function square($n)
    {
      for ($i=1; $i <=$n ; $i++) { 
        for ($x=1; $x <=$n ; $x++) { 
          echo '*';
        }
        echo '<br>';
      }
    }
  ?>

</body>
</html>