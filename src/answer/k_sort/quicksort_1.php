<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>quick_sort</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

  <?php
    $a=array(10,3,1,9,7,6,8,2,4,5);
  // クイックソートを使用して配列$aの値を小さい順番に並べて下さい。
  // 10 3 1 9 7 6 8 2 4 5
  // 範囲:0-9 基準値: 7 [0]と[9]を入れ替え
  // 5 3 1 9 7 6 8 2 4 10
  // 範囲:0-9 基準値: 7 [3]と[8]を入れ替え
  // 5 3 1 4 7 6 8 2 9 10
  // 上のように実行の過程も表示してください。
    
    // 外部ファイルに定義した関数を使えるようにするため読み込む
    require "module.php";
    
    // コメントを外すと1~100までの数字がランダムに並べられた配列になる
    $a=range(1,100);
    shuffle($a);

    $br="<br>";
    
    echo "初期値".$br;
    echo "a=".array_text($a).$br.$br;
    echo "".$br;
    
    $result=quick_sort($a, 0, count($a)-1);
    
    echo echo_result($result);
    

    
    function quick_sort(&$array, $left, $right){
        global $br;
        $left_index=$left;
        $right_index =$right;
        $text="-----------------------------------------------------------------".$br;
        // 基準値をleft-right間の中央要素に設定
        $standard_value =$array[ceil(($left_index + $right_index) / 2)];
        $text.="基準値 : {$standard_value}".$br;
        $text.="left={left} , right={$right}".$br;
        //並び替えができなくなるまで
        while ($left_index<=$right_index){
            
            // 左側で注目している値が基準値より小さい場合はポインターは進める
            while ($array[$left_index]<$standard_value){
                $left_index++;
            }
            
            // 右側で注目している値が基準値より大きい場合はポインターは進める
            while ($array[$right_index]>$standard_value){
                $right_index--;
            }
            
            // 基準値より小さい要素の配列番号が、基準値より大きい要素の配列番号以下場合のみ交換を行う
            if ($left_index<=$right_index){
                $exchange=exchange($array, $left_index, $right_index);
                $text.=$exchange[1];
                $array=$exchange[0];

                // 左右のindexを進めて比較を続行する
                $left_index++;
                $right_index--;
            }
        }

        // 分割後の左側配列の長さが2以上の場合、再帰処理を行う
        if ($left<$right_index){
            $q_s=quick_sort($array, $left, $right_index);
            $array=$q_s[0];
            $text.=$q_s[1];
        }

        // 分割後の右側配列の長さが2以上の場合、再帰処理を行う
        if ($left_index<$right){
            $q_s=quick_sort($array, $left_index, $right);
            $array=$q_s[0];
            $text.=$q_s[1];
        }
        return array($array, $text);
    }
    
    
    
  ?>

</body>
</html>