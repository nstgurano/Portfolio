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
    
    triangle(rand(2,10));
    
    // コードの別パターンが思いつかなかったので答えの別パターンとして例の三角形を反時計回りに90度回転したものにした
    // 文字幅の関係で半角だと菱形っぽくなるのでスペースとアスタリスクを全角に変更
    function triangle($n){
        $blunk="　";
        $br="<br>";
        echo "n={$n}".$br;
        
        // 90度回転する前、全ての行の内、アスタリスクの最大個数は(2*$n-1)。
        // 今回の場合、echoすべき行数がこれと等しいので、終端に(2*$n-1)を設定
        for($i=1;$i<=(2*$n-1);$i++){
            $print="";
            
            // 90度回転する前、echoすべき行数は$n。
            // i行目に必要なスペースの数は、$nと行数の差分(絶対値)なので、終端にabs($n-$i)を設定
            // このfor文をコメントアウトすると時計回りに90度回転した形になる。
            for($j=0;$j<abs($n-$i);$j++){
                $print.=$blunk;
            }
            
            // 90度回転する前、echoすべき行数は$n。
            // 今回の場合、アスタリスクの最大個数と各行に必要なスペースの数の差分(絶対値)がこれと等しいので、終端にabs($n-abs($n-$i))を設定
            for($j=0;$j<abs($n-abs($n-$i));$j++){
                $print.="＊";
            }
            echo $print.$br;
        }
    }

  ?>

</body>
</html>