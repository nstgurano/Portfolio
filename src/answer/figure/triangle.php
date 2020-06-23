<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>triangle</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

  <?php
    // アスタリスクで三角形を作って出力するメソッド triangle($n) を宣言して実行して下さい。
    // ex triangle(5) の場合の出力
    // 	   *
    //    ***
    //   *****
    //  *******
    // *********
    $n=rand(2,7);
    triangle($n);

    function triangle($n)
    {
      for ($i=1; $i <=$n ; $i++) { //
        for ($s=1; $s <=$n-$i ; $s++) { 
          echo '&nbsp';
        }
        for ($x=1; $x <=$i*2-1 ; $x++) { 
          echo '*';
        }
        echo '<br>';
      }
    }

  ?>

</body>
</html>