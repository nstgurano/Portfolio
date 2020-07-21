<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>heapsort</title>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

  <?php
	// ヒープソートを使用して配列$numsの値を小さい順番に並べて下さい。
	//            70
	//          ／   ＼
	//        28       72
	//     ／   ＼   ／   ＼
	//    93     98 41     68
	// ／
	//26
	// また上のように配列の値の交換が行われるたびに、配列の値を木形式で表示してください。
	$nums = array(70,28,68,93,98,41,72,26);
	$arr=[];
	$countNums=count($nums)-1;//$numsの配列の長さ確認

	echo '【初期値】'.'<br>';
	foreach ($nums as $key) {
		echo $key.'&nbsp';
	}

	heap($arr,$nums,$countNums);//引数は、ソートしたものを入れる配列、ソートする配列、ソートする配列の長さ


	echo '【ソート後】'.'<br>';
	foreach ($arr as $key) {
		echo $key.'&nbsp';
	}

	function echo_tree($nums){
		global $br;
		$br="<br>";
        $string="";
        $string.=$br."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$nums[0]}".$br;
        $string.="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;／&nbsp;&nbsp;&nbsp;＼".$br;
        $string.="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$nums[1]}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$nums[2]}".$br;
        $string.="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;／&nbsp;&nbsp;&nbsp;＼&nbsp;&nbsp;&nbsp;／&nbsp;&nbsp;&nbsp;＼".$br;
        $string.="&nbsp;&nbsp;&nbsp;&nbsp;{$nums[3]}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$nums[4]}&nbsp;{$nums[5]}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$nums[6]}".$br;
        $string.="&nbsp;&nbsp;／".$br;
		$string.="{$nums[7]}".$br.$br;
		
        echo  $string;
	 }

	
	function heap(&$arr,$nums,$countNums)//$arrは参照渡し
	{
		for ($i=$countNums; 0<=$i; $i--) {//配列の最後の要素から検索
			$parent=floor(($i-1)/2);//子要素の親要素を定義

			if ($nums[$i]<$nums[$parent]) {//子要素が親よりも小さい場合
				echo "<br>$nums[$i]と$nums[$parent]を入れ替え<br>";
				$tmp=$nums[$parent];
				$nums[$parent]=$nums[$i];
				$nums[$i]=$tmp;
				echo_tree($nums);
			}
		}

		$arr[]=array_shift($nums);//$numsの中の先頭の要素を取り出す
		$countNums -=1;//先頭の要素を取り出し、1つ要素が少なくなったので、-1をして次の値に進む

		if ($countNums>=0) {//要素が0になるまで、以下の再起処理
			heap($arr,$nums,$countNums);
		}
	}
	

  ?>

</body>
</html>