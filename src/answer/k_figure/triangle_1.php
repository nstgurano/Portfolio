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
    
    triangle(5);
    
    function triangle($n){
        $blunk="&nbsp;";
        $br="<br>";
        
        
        for($i=1;$i<=$n;$i++){
            $print="";
            // i行目に必要な空白の数は、総行数との差分に等しいので、ループの終端を$n-$iに設定
            for($j=0;$j<($n-$i);$j++){
                $print.=$blunk;
            }
            // 1行目にアスタリスクが1つ、2行目以降は行毎に2つ増えるので、ループの終端を2*$i-1に設定
            for($j=0;$j<(2*$i-1);$j++){
                $print.="*";
            }
            echo $print.$br;
        }
        
    }

  ?>

</body>
</html>