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
    
    // 正方形なので1行に表示する文字列を1つ作り、それを指定回数分echoするパターン
    function square($n){
        $print="";
        $br="<br>";
        
        // 各行共通して表示する文字列を作成
        for($i=0;$i<$n;$i++){
            $print.="*";
        }
        
        // 作成した文字列を回数分echoする
        for($i=0;$i<$n;$i++){
            echo $print.$br;
        }
    }

  ?>

</body>
</html>