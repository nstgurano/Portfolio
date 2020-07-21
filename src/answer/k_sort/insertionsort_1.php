<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>insertionsort</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

  <?php
  // 挿入ソートを使用して配列$aの値を小さい順番に並べて下さい。
  // 9 6 5 1 2
  // 6の位置を決める1周目のループです。
  // [0]の位置に[1]を挿入
  // 6 9 5 1 2
  // 5の位置を決める2周目のループです。
  // [1]の位置に[2]を挿入
  // [0]の位置に[1]を挿入
  // 5 6 9 1 2
  // 上のように実行の過程も表示してください。
    $a = array(9,6,5,1,2);
    
    // 外部ファイルに定義した関数を使えるようにするため読み込む
    require "module.php";
    
    // コメントを外すと1~100までの数字がランダムに並べられた配列になる
    $a=range(1,100);
    shuffle($a);
    
    $br="<br>";
    echo "初期値".$br;
    echo array_text($a).$br;
    
    $result=insert_sort($a);
    
    echo echo_result($result);
    
    
    
    
    
    function insert_sort($array){
        global $br;
        $text="";
        $array_length=count($array);
        
        // 0~i-1...整列されていると見なせる範囲
        for($i=1;$i<$array_length;$i++){
            // [i]の要素を挿入したい場所(初期値0)
            $insert_place=0;
            
            // 整列が既に行われている範囲内で、[i]要素との大小比較を一つずつを行い、[i]要素の方が大きかった場合はinsert_placeを更新していく
            for($j=0;$j<$i;$j++){
                
                if($array[$j]<$array[$i]){
                    $insert_place=$j+1;
                }
                
            }
            
            $text.="[{$i}]を[{$insert_place}]に挿入".$br;
            $array=insert($array, $i, $insert_place);
            $text.=array_text($array);
        }
        return array($array, $text);
    }
    
    // array[insert_num]をarray[insert_place]へ挿入を行う関数
    function insert($array, $insert_num, $insert_place){
        // 指定の場所へ挿入したい値を保持しておく
        $memory=$array[$insert_num];
        // 挿入箇所より配列番号が大きいものを1つずつ右の要素へ移し替えていく
        for($i=$insert_num;$i>$insert_place;$i--){
            $array[$i]=$array[$i-1];
        }

        $array[$insert_place]=$memory;
        return $array;
    }


  ?>

</body>
</html>