<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>mergesort</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

  <?php
  // マージソートを使用して配列$numbersの値を小さい順番に並べて下さい。
	// またマージソートの過程を出力するプログラムも書いて下さい。
	// ex Array ( [0] => 20 [1] => 10 [2] => 2 [3] => 12 [4] => 7 [5] => 16 [6] => 8 [7] => 13 [8] => 1 )
	// 上の配列をソートしていきます。
	// Array ( [0] => 20 [1] => 10 [2] => 2 [3] => 12 [4] => 7 ) 2分割をした結果の前半部分です。
	// Array ( [0] => 16 [1] => 8 [2] => 13 [3] => 1 ) 2分割をした結果の後半部分です。
	// Array ( [0] => 20 [1] => 10 [2] => 2 ) 2分割をした結果の前半部分です。
	// Array ( [0] => 12 [1] => 7 ) 2分割をした結果の後半部分です。
	// Array ( [0] => 20 [1] => 10 ) 2分割をした結果の前半部分です。
	// Array ( [0] => 2 ) 2分割をした結果の後半部分です。
	// 20と10を入れ替えます。
	// 配列のマージを開始します
	// $left=>array(2) { [0]=> int(10) [1]=> int(20) }
	// $right=>array(1) { [0]=> int(2) }
	// $result=>array(3) { [0]=> int(2) [1]=> int(10) [2]=> int(20) } マージした結果。
	// 配列のマージが終了しました。
	// 12と7を入れ替えます。
	// 配列のマージを開始します
	// $left=>array(3) { [0]=> int(2) [1]=> int(10) [2]=> int(20) }
	// $right=>array(2) { [0]=> int(7) [1]=> int(12) }
	// $result=>array(5) { [0]=> int(2) [1]=> int(7) [2]=> int(10) [3]=> int(12) [4]=> int(20) } マージした結果。
	// 配列のマージが終了しました。
	// Array ( [0] => 16 [1] => 8 ) 2分割をした結果の前半部分です。
	// Array ( [0] => 13 [1] => 1 ) 2分割をした結果の後半部分です。
	// 16と8を入れ替えます。
	// 13と1を入れ替えます。
	// 配列のマージを開始します
	// $left=>array(2) { [0]=> int(8) [1]=> int(16) }
	// $right=>array(2) { [0]=> int(1) [1]=> int(13) }
	// $result=>array(4) { [0]=> int(1) [1]=> int(8) [2]=> int(13) [3]=> int(16) } マージした結果。
	// 配列のマージが終了しました。
	// 配列のマージを開始します
	// $left=>array(5) { [0]=> int(2) [1]=> int(7) [2]=> int(10) [3]=> int(12) [4]=> int(20) }
	// $right=>array(4) { [0]=> int(1) [1]=> int(8) [2]=> int(13) [3]=> int(16) }
	// $result=>array(9) { [0]=> int(1) [1]=> int(2) [2]=> int(7) [3]=> int(8) [4]=> int(10) [5]=> int(12) [6]=> int(13) [7]=> int(16) [8]=> int(20) } マージした結果。
	// 配列のマージが終了しました。
	// Array ( [0] => 1 [1] => 2 [2] => 7 [3] => 8 [4] => 10 [5] => 12 [6] => 13 [7] => 16 [8] => 20 )
	// ※上の出力はあくまで例です。ご自分でわかりやすい出力に書き換えて下さっても構いません。
	$numbers = array(20,10,2,12,7,16,8,13,1);
	
    
    
    // 外部ファイルに定義した関数を使えるようにするため読み込む
    require "module.php";
    
    
    // コメントを外すと1~100までの数字がランダムに並べられた配列になる
    $numbers=range(1,100);
    shuffle($numbers);
    
    
    $br="<br>";
    
    echo "初期値".$br;
    echo "numbers=".array_text($numbers).$br;
    
    $result=merge_sort($numbers);
    
    echo echo_result($result);
    
    
    // 元の配列が既に要素数1の配列まで分割されているものとみなし、2個、4個、8個...の配列にマージしていく
    function merge_sort($array){
        global $br;
        $array_length=count($array);
        $text="";
        // i...マージする左右配列の最大要素数(n=1:1,n>=2:2(n-1))
        // 実際にこの数だけ要素が存在するとは限らない
        for($i=1;$i<$array_length;$i+=$i){
            
            // j-i...左側配列の先頭要素
            // j...右側配列の先頭要素
            for($j=$i;$j<$array_length;$j+=2*$i){
                

                // 左側と右側の配列を作成
                $left_array=array_slice($array,$j-$i, $i);
                $right_array=array_slice($array,$j, $i);
                $text.="-------------------------------------------------------------------------------------".$br;
                $text.="left_array.length=".count($left_array).$br;
                $text.="left_array=".array_text($left_array);
                $text.="right_array.length=".count($right_array).$br;
                $text.="right_array=".array_text($right_array);
                
                // 左右配列のマージを行う
                $merged=merge($left_array, $right_array);
                $text.="マージ結果".$br;
                $text.="merged=".array_text($merged);
                $text.="マージ先".$br;
                $start=$j-$i;
                $end=$start+count($merged)-1;
                $text.="[{$start}]~[{$end}]".$br;
                // 左右配列のマージ結果をreturnする配列の反映する
                for($k=0;$k<count($merged);$k++){
                    $array[$j-$i+$k]=$merged[$k];
                }
                $text.="num=".array_text($array);
            }
            
        }
        
        return array($array, $text);
    }
    
    // 左側配列と右側配列のマージを行う
    function merge($left_array, $right_array){
        global $br;
        $text.="";
        $merged=array();
        $left_index=0;
        $right_index=0;
        
        // 左右配列の注目要素を比較し、小さい方をreturnする配列の要素に上書きしていく
        // k...returnする配列の要素番号。左右配列の要素数分(k_max)だけループする
        $i_max=count($left_array)+count($right_array);
        for($i=0;$i<$i_max;$i++){

            // 左側の配列と右側の配列のそれぞれの先頭要素に注目しての大小比較を行う

            // 左右配列それぞれで注目している要素の値が存在する場合
            if($left_array[$left_index]!=null && $right_array[$right_index]!=null){
                if($left_array[$left_index]<$right_array[$right_index]){
                    $merged[]=$left_array[$left_index];
                    $left_index++;
                }else{
                    $merged[]=$right_array[$right_index];
                    $right_index++;
                }

            // 左配列で注目している要素は存在し、右配列で注目している要素のみnullの場合
            }elseif($left_array[$left_index]!=null){
                $merged[]=$left_array[$left_index];
                $left_index++;

            // 左配列で注目している要素のみnullで、右配列で注目している要素は存在する場合
            }elseif($right_array[$right_index]!=null){
                $merged[]=$right_array[$right_index];
                $right_index++;

            // 両配列の注目要素がnullの場合(必要なコードか分からないけど一応記述)
            }else{
                break;
            }
        }
        return $merged;
    }
    
    
    
    
    
  ?>

</body>
</html>