<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>bubble sort</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

  <?php
  // バブルソートを使用して配列$aの値を小さい順番に並べて下さい。
  // 2 4 1 3
  // [1]と[2]を入れ替え
  // 2 1 4 3
  // [2]と[3]を入れ替え
  // 2 1 3 4
  // [0]と[1]を入れ替え
  // 1 2 3 4
  // 上のように実行の過程も表示してください。
    $a = array(2,4,1,3);
    
    
    
    // 外部ファイルに定義した関数を使えるようにするため読み込む
    require "module.php";
    
    // コメントを外すと1~100までの数字がランダムに並べられた配列になる
    $a=range(1,100);
    shuffle($a);
    
    
    $br="<br>";
    
    echo "初期値".$br;
    echo array_text($a).$br;
    
    $result=bubble($a);
    
    echo echo_result($result);
    
    
    function bubble($array){
        global $br;
        $array_length=count($array);
        $i_end=$array_length-1;
        $process="";
        
        // i...整列が完了した要素数に等しい
        for($i=0;$i<$i_end;$i++){
            
            // $iが1周する毎に、最大値側から整列されていくので、整列の対象範囲を狭めていく為にi_endからi回分だけj_endを減らしていく
            $j_end=$i_end-$i;
            for($j=0;$j<$j_end;$j++){
                
                // 隣同士の要素の大小関係を調べる
                if($array[$j]>$array[$j+1]){
                    // 大小関係が不正だった場合、入れ替える
                    $exchange=exchange($array,$j, $j+1);
                    $array=$exchange[0];
                    $process.=$exchange[1];
                }
                
            }
            
        }
        
        return array($array, $process);
        
    }
    
    
    
    
    
    
    
  ?>

</body>
</html>