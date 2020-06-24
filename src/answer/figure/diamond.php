<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>diamond</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

  <?php
    // アスタリスクでひし形を作って出力するメソッド diamond($n) を宣言して実行して下さい。
    // ex diamond(5) の場合の出力
    //     ※
    //   ※※※
    // ※※※※※
    //   ※※※
    //     ※

    
    $n=5;//5の場合のみひし形完成
    $center=ceil($n/2);

    diamondUpper($n,$center);
    diamondDown($n,$center);

    function diamondUpper($n,$center)
    {
      for ($i=1; $i <=$center ; $i++) { 
        for ($a=1; $a <=$n-$i-2 ; $a++) { 
          echo '&nbsp&nbsp';
        }
        for ($b=1; $b <=$i*2-1 ; $b++) { 
          echo '*';
        }
        echo '<br>';
      }
    }

    function diamondDown($n,$center)
    {
      for ($c=1; $c <=$center-1 ; $c++) { 
        for ($d=1; $d <=$c; $d++) { 
          echo '&nbsp&nbsp';
        }
        for ($e=1; $e <=($n-$c)*2-$n; $e++) { 
          echo '*';
        }

        echo '<br>';
      }
    }

  ?>

</body>
</html>