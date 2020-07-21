<!DOCTYPE htm+1l>
<html>
<head>
  <meta charset="utf-8">
  <title>selectionsort</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

  <?php
  // 選択ソートを使用して配列$aの値を小さい順番に並べて下さい。
  // 10 3 1 4 2
  // 10と1を交換します。
  // 1 3 10 4 2
  // 3と2を交換します。
  // 1 2 10 4 3
  // 上のように実行の過程も表示してください。
    $a = array(10,3,1,4,2);
    
    
    // 外部ファイルに定義した関数を使えるようにするため読み込む
    require "module.php";
    
    // コメントを外すと1~100までの数字がランダムに並べられた配列になる
    $a=range(1,100);
    shuffle($a);
    
    
    $br="<br>";
    
    
    echo "初期値".$br;
    echo array_string($a);
    
    $result=selection_sort($a);
    
    echo echo_result($result);

    
    function selection_sort($array){
        global $br;
        $array_length=count($array);
        $text="";
        
        // [0]~[i]までが整列が完了した範囲となる
        for($i=0;$i<$array_length;$i++){
            
            // [$select](初期値i)とそれ以降の配列番号([j])の要素と大小比較を行い、jの方が小さかった場合はselectを更新する
            $select=$i;
            for($j=$i+1;$j<$array_length;$j++){
                if($array[$j]<$array[$select]){
                    $select=$j;
                }
            }
            
            // [i]~[array_length]までの比較が終わったら、[i]と[select]の要素の入れ替えを実行する
            $exchange=exchange($array, $i, $select);
            $array=$exchange[0];
            $text.=$exchange[1].$br;
        }
        return array($array, $text);
    }
    
    
    // 配列の内容をechoするために文字列化する関数
    function array_string($array){
        global $br;
        
        for($i=0;$i<count($array);$i++){
            $string.="[{$i}]:".$array[$i];
            
            if($i!==count($array)-1){
                $string.=",&nbsp;";
            }
            
        };
        
        $string.=$br.$br;
        return $string;
    }
    
    
    
  ?>

</body>
</html>