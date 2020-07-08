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
    
    square(7);
    
    // 二重for文で書く場合
    function square($n){
        $print="";
        $br="<br>";
        for($i=0;$i<$n;$i++){
            for($j=0;$j<$n;$j++){
                echo "*";
            }
            echo $br;
        }
    }

  ?>

</body>
</html>