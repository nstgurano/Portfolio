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
    
    diamond(2*rand(2,10)-1);
    
    function diamond($n){
        // pivot...真ん中の(アスタリスクが一番多くなる)行数
        // この時のアスタリスクの数は2*$pivot-1個
        $pivot=ceil($n/2);
        $end=$n;
        $br="<br>";
        echo "n={$n}".$br;
        $arr=array();
        
        for($i=1;$i<=$end;$i++){
            
            // pivot行目までは最初のパターンと同様に出力する
            if($i<=$pivot){
                $print="";

                // i行目に必要なスペースの数は、pivotとiの差分(絶対値)に等しい
                $blunk_num=abs($pivot-$i);
                for($j=0;$j<$blunk_num;$j++){
                    $print.="　";
                }

                // i行目に必要なアスタリスクの数は常に奇数なので2N-1
                // Nの部分に入るのはpivotからi行目に必要なスペースの数を引いたもの
                $asta_num=2*($pivot-abs($pivot-$i))-1;
                for($j=0;$j<$asta_num;$j++){
                    $print.="＊";
                }

                echo $print.$br;
                
                // pivot行目以外の出力結果を配列に入れて保存しておく
                if($i<$pivot){
                    array_push($arr,$print);
                }
                
            }else{ // pivot行目より後は配列に保存しておいたものを逆順で出力する
                echo $arr[$end-$i].$br;
                
            }
        }
    }
    
    

  ?>

</body>
</html>